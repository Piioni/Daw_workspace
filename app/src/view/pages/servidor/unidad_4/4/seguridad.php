<?php
$title = 'Seguridad en PHP';

// Array de usuarios
if (! isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [
        [
            'id' => 1,
            'nombre' => 'Admin',
            'correo' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'rol' => 'admin',
            'telefono' => openssl_encrypt('666123456', 'AES-128-CBC', 'clave_secreta_32b', 0, '1234567890123456'),
        ],
        [
            'id' => 2,
            'nombre' => 'Editor',
            'correo' => 'editor@example.com',
            'password' => password_hash('editor123', PASSWORD_BCRYPT),
            'rol' => 'editor',
            'telefono' => openssl_encrypt('666654321', 'AES-128-CBC', 'clave_secreta_32b', 0, '1234567890123456'),
        ],
    ];
}

// Registro de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'registro') {
    $nombre = trim($_POST['reg_nombre'] ?? '');
    $correo = trim($_POST['reg_correo'] ?? '');
    $password = $_POST['reg_password'] ?? '';
    $confirm_password = $_POST['reg_confirm_password'] ?? '';

    $error_reg = '';

    if (empty($nombre) || empty($correo) || empty($password)) {
        $error_reg = 'Todos los campos son obligatorios.';
    } elseif (! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error_reg = 'El correo no es válido.';
    } elseif ($password !== $confirm_password) {
        $error_reg = 'Las contraseñas no coinciden.';
    } elseif (strlen($password) < 6) {
        $error_reg = 'La contraseña debe tener al menos 6 caracteres.';
    } else {
        // Verificar si el correo ya existe
        $correo_existe = false;
        foreach ($_SESSION['usuarios'] as $user) {
            if ($user['correo'] === $correo) {
                $correo_existe = true;
                break;
            }
        }

        if ($correo_existe) {
            $error_reg = 'Este correo ya está registrado.';
        } else {
            // Crear nuevo usuario
            $new_id = max(array_column($_SESSION['usuarios'], 'id')) + 1;
            $_SESSION['usuarios'][] = [
                'id' => $new_id,
                'nombre' => htmlspecialchars($nombre),
                'correo' => htmlspecialchars($correo),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'rol' => 'usuario',
                'telefono' => null,
            ];
            $_SESSION['msg_registro'] = 'Registro exitoso. Ahora puedes iniciar sesión.';
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}

// Login de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $correo = trim($_POST['login_correo'] ?? '');
    $password = $_POST['login_password'] ?? '';

    $error_login = '';
    $usuario_encontrado = null;

    foreach ($_SESSION['usuarios'] as $user) {
        if ($user['correo'] === $correo) {
            $usuario_encontrado = $user;
            break;
        }
    }

    if ($usuario_encontrado === null) {
        $error_login = 'Correo o contraseña incorrectos.';
    } elseif (! password_verify($password, $usuario_encontrado['password'])) {
        $error_login = 'Correo o contraseña incorrectos.';
    } else {
        // Login exitoso
        $_SESSION['usuario_autenticado'] = [
            'id' => $usuario_encontrado['id'],
            'nombre' => $usuario_encontrado['nombre'],
            'correo' => $usuario_encontrado['correo'],
            'rol' => $usuario_encontrado['rol'],
        ];
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

// Logout
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    unset($_SESSION['usuario_autenticado']);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'guardar_datos') {
    $nombre = trim($_POST['datos_nombre'] ?? '');
    $correo = trim($_POST['datos_correo'] ?? '');
    $telefono = trim($_POST['datos_telefono'] ?? '');

    $error_datos = '';

    if (empty($nombre) || empty($correo) || empty($telefono)) {
        $error_datos = 'Todos los campos son obligatorios.';
    } elseif (! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error_datos = 'El correo no es válido.';
    } elseif (! preg_match('/^[0-9]{9}$/', $telefono)) {
        $error_datos = 'El teléfono debe tener 9 dígitos.';
    } else {
        // Encriptar teléfono
        $telefono_encriptado = openssl_encrypt($telefono, 'AES-128-CBC', 'clave_secreta_32b', 0, '1234567890123456');
        $_SESSION['datos_guardados'] = [
            'nombre' => htmlspecialchars($nombre),
            'correo' => htmlspecialchars($correo),
            'telefono_encriptado' => $telefono_encriptado,
            'telefono_visibles' => '***' . substr($telefono, -3),
        ];
        $_SESSION['msg_datos'] = 'Datos guardados y teléfono encriptado correctamente.';
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

include VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Seguridad en PHP</h1>
        <p class="mt-2 text-secondary">Encriptación, autenticación y control de acceso</p>
    </div>

    <main class="mx-auto max-w-7xl py-12">
        <!-- ===== EJERCICIO 1 Y 2: REGISTRO E LOGIN ===== -->
        <div class="mb-12 grid grid-cols-1 gap-12 md:grid-cols-2">
            <!-- REGISTRO -->
            <div class="card">
                <h2 class="text-heading mb-6 text-center text-2xl font-semibold">Ejercicio 1: Registro</h2>

                <?php if (isset($_SESSION['msg_registro'])): ?>

                <div
                    class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center text-accent"
                >
                    <?php echo $_SESSION['msg_registro'];
                    unset($_SESSION['msg_registro']); ?>
                </div>

                <?php endif; ?>

                <?php if (!isset($_SESSION['usuario_autenticado'])): ?>

                <?php if (!empty($error_reg)): ?>

                <div
                    class="mb-4 rounded-lg border-2 border-dashed border-red-400/30 bg-red-400/10 p-4 text-center text-red-600"
                >
                    <?php echo htmlspecialchars($error_reg); ?>
                </div>

                <?php endif; ?>

                <form method="POST" class="space-y-4">
                    <input type="hidden" name="action" value="registro" />
                    <div>
                        <label class="form-label" for="reg_nombre">Nombre completo:</label>
                        <input
                            type="text"
                            id="reg_nombre"
                            name="reg_nombre"
                            class="form-input"
                            required
                            placeholder="Juan Pérez"
                        />
                    </div>
                    <div>
                        <label class="form-label" for="reg_correo">Correo electrónico:</label>
                        <input
                            type="email"
                            id="reg_correo"
                            name="reg_correo"
                            class="form-input"
                            required
                            placeholder="juan@example.com"
                        />
                    </div>
                    <div>
                        <label class="form-label" for="reg_password">Contraseña:</label>
                        <input
                            type="password"
                            id="reg_password"
                            name="reg_password"
                            class="form-input"
                            required
                            placeholder="Mín. 6 caracteres"
                        />
                    </div>
                    <div>
                        <label class="form-label" for="reg_confirm_password">Confirmar contraseña:</label>
                        <input
                            type="password"
                            id="reg_confirm_password"
                            name="reg_confirm_password"
                            class="form-input"
                            required
                        />
                    </div>
                    <button type="submit" class="btn-form w-full">Registrarse</button>
                </form>

                <div class="mt-4 rounded-lg bg-secondary/10 p-4">
                    <p class="text-sm text-secondary">
                        <strong>Prueba:</strong>
                        admin
                        @example.com
                        / admin123
                    </p>
                </div>

                <?php else: ?>

                <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-6 text-center">
                    <p class="text-heading mb-2 text-lg font-semibold">Ya estás registrado</p>
                    <p class="text-secondary">
                        Estás autenticado como:
                        <strong><?php echo htmlspecialchars($_SESSION['usuario_autenticado']['nombre']); ?></strong>
                    </p>
                </div>

                <?php endif; ?>
            </div>

            <!-- LOGIN -->
            <div class="card">
                <h2 class="text-heading mb-6 text-center text-2xl font-semibold">Ejercicio 2: Iniciar Sesión</h2>

                <?php if (!isset($_SESSION['usuario_autenticado'])): ?>

                <?php if (!empty($error_login)): ?>

                <div
                    class="mb-4 rounded-lg border-2 border-dashed border-red-400/30 bg-red-400/10 p-4 text-center text-red-600"
                >
                    <?php echo htmlspecialchars($error_login); ?>
                </div>

                <?php endif; ?>

                <form method="POST" class="space-y-4">
                    <input type="hidden" name="action" value="login" />
                    <div>
                        <label class="form-label" for="login_correo">Correo electrónico:</label>
                        <input
                            type="email"
                            id="login_correo"
                            name="login_correo"
                            class="form-input"
                            required
                            placeholder="admin@example.com"
                        />
                    </div>
                    <div>
                        <label class="form-label" for="login_password">Contraseña:</label>
                        <input
                            type="password"
                            id="login_password"
                            name="login_password"
                            class="form-input"
                            required
                            placeholder="admin123"
                        />
                    </div>
                    <button type="submit" class="btn-form w-full">Iniciar Sesión</button>
                </form>

                <div class="mt-4 space-y-2 rounded-lg bg-secondary/10 p-4">
                    <p class="text-sm text-secondary"><strong>Usuarios de prueba:</strong></p>
                    <p class="text-xs text-secondary">
                        Admin: admin
                        @example.com
                        / admin123
                    </p>
                    <p class="text-xs text-secondary">
                        Editor: editor
                        @example.com
                        / editor123
                    </p>
                </div>

                <?php else: ?>

                <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-6 text-center">
                    <p class="text-heading mb-4 text-2xl font-bold">Bienvenido</p>
                    <p class="mb-2 text-lg text-secondary">
                        <?php echo htmlspecialchars($_SESSION['usuario_autenticado']['nombre']); ?>
                    </p>
                    <p class="mb-4 text-sm text-secondary">
                        <strong>Rol:</strong>
                        <?php echo ucfirst(htmlspecialchars($_SESSION['usuario_autenticado']['rol'])); ?>
                    </p>
                    <form method="POST">
                        <input type="hidden" name="action" value="logout" />
                        <button type="submit" class="btn-form w-full">Cerrar Sesión</button>
                    </form>
                </div>

                <?php endif; ?>
            </div>
        </div>


        <?php if (isset($_SESSION['usuario_autenticado'])): ?>

        <div class="card mb-12">
            <h2 class="text-heading mb-6 text-center text-2xl font-semibold">
                Ejercicio 3 & 4: Panel de Control por Rol
            </h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div
                    class="<?php echo $_SESSION['usuario_autenticado']['rol'] !== 'admin' ? 'opacity-50' : ''; ?> rounded-lg border-2 border-primary/30 bg-primary/10 p-6"
                >
                    <h3 class="text-heading mb-4 text-lg font-bold">Panel Admin</h3>

                    <?php if ($_SESSION['usuario_autenticado']['rol'] === 'admin'): ?>

                    <ul class="space-y-2 text-secondary">
                        <li>Ver todos los usuarios</li>
                        <li>Gestionar permisos</li>
                        <li>Eliminar contenido</li>
                        <li>Ver estadísticas</li>
                        <li>Acceso total al sistema</li>
                    </ul>

                    <?php else: ?>

                    <p class="font-semibold text-red-600">Acceso denegado</p>
                    <p class="mt-2 text-sm text-secondary">Solo administradores pueden acceder.</p>

                    <?php endif; ?>
                </div>

                <!-- EDITOR -->
                <div
                    class="<?php echo $_SESSION['usuario_autenticado']['rol'] !== 'editor' && $_SESSION['usuario_autenticado']['rol'] !== 'admin'     ? 'opacity-50'     : ''; ?> rounded-lg border-2 border-accent/30 bg-accent/10 p-6"
                >
                    <h3 class="text-heading mb-4 text-lg font-bold">Panel Editor</h3>

                    <?php if ($_SESSION['usuario_autenticado']['rol'] === 'editor' || $_SESSION['usuario_autenticado']['rol'] === 'admin'): ?>

                    <ul class="space-y-2 text-secondary">
                        <li>Crear contenido</li>
                        <li>Editar contenido</li>
                        <li>Publicar artículos</li>
                        <li>Ver comentarios</li>
                    </ul>

                    <?php else: ?>

                    <p class="font-semibold text-red-600">Acceso denegado</p>
                    <p class="mt-2 text-sm text-secondary">Requiere rol editor o admin.</p>

                    <?php endif; ?>
                </div>

                <!-- USUARIO -->
                <div class="rounded-lg border-2 border-secondary/30 bg-secondary/10 p-6">
                    <h3 class="text-heading mb-4 text-lg font-bold">Panel Usuario</h3>

                    <?php if ($_SESSION['usuario_autenticado']['rol'] === 'usuario' || $_SESSION['usuario_autenticado']['rol'] === 'editor' || $_SESSION['usuario_autenticado']['rol'] === 'admin'): ?>

                    <ul class="space-y-2 text-secondary">
                        <li>Ver perfil</li>
                        <li>Editar datos personales</li>
                        <li>Cambiar contraseña</li>
                        <li>Ver historial</li>
                    </ul>

                    <?php else: ?>

                    <p class="font-semibold text-red-600">Acceso denegado</p>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php endif; ?>

        <!-- ===== EJERCICIO 5: CIFRADO DE DATOS SENSIBLES ===== -->
        <div class="card">
            <h2 class="text-heading mb-6 text-center text-2xl font-semibold">
                Ejercicio 5: Cifrado de Datos Sensibles
            </h2>

            <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                <!-- FORMULARIO -->
                <div>
                    <h3 class="text-heading mb-4 text-lg font-semibold">Guardar Datos Encriptados</h3>

                    <?php if (!empty($error_datos)): ?>

                    <div
                        class="mb-4 rounded-lg border-2 border-dashed border-red-400/30 bg-red-400/10 p-4 text-center text-red-600"
                    >
                        <?php echo htmlspecialchars($error_datos); ?>
                    </div>

                    <?php endif; ?>

                    <?php if (isset($_SESSION['msg_datos'])): ?>

                    <div
                        class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center text-accent"
                    >
                        <?php echo $_SESSION['msg_datos'];
                        unset($_SESSION['msg_datos']); ?>
                    </div>

                    <?php endif; ?>

                    <form method="POST" class="space-y-4">
                        <input type="hidden" name="action" value="guardar_datos" />
                        <div>
                            <label class="form-label" for="datos_nombre">Nombre:</label>
                            <input
                                type="text"
                                id="datos_nombre"
                                name="datos_nombre"
                                class="form-input"
                                required
                                placeholder="Juan García"
                            />
                        </div>
                        <div>
                            <label class="form-label" for="datos_correo">Correo:</label>
                            <input
                                type="email"
                                id="datos_correo"
                                name="datos_correo"
                                class="form-input"
                                required
                                placeholder="juan@example.com"
                            />
                        </div>
                        <div>
                            <label class="form-label" for="datos_telefono">Teléfono (9 dígitos):</label>
                            <input
                                type="tel"
                                id="datos_telefono"
                                name="datos_telefono"
                                class="form-input"
                                required
                                placeholder="666123456"
                            />
                        </div>
                        <button type="submit" class="btn-form w-full">Guardar Datos</button>
                    </form>
                </div>

                <div>
                    <h3 class="text-heading mb-4 text-lg font-semibold">Datos Guardados</h3>

                    <?php if (isset($_SESSION['datos_guardados'])): ?>

                    <div class="space-y-4">
                        <div class="rounded-lg border-2 border-dashed border-primary/30 bg-primary/10 p-4">
                            <p class="text-sm text-secondary">Nombre:</p>
                            <p class="text-heading font-mono">
                                <?php echo htmlspecialchars($_SESSION['datos_guardados']['nombre']); ?>
                            </p>
                        </div>

                        <div class="rounded-lg border-2 border-dashed border-primary/30 bg-primary/10 p-4">
                            <p class="text-sm text-secondary">Correo:</p>
                            <p class="text-heading font-mono">
                                <?php echo htmlspecialchars($_SESSION['datos_guardados']['correo']); ?>
                            </p>
                        </div>

                        <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4">
                            <p class="mb-2 text-sm text-secondary">Teléfono (Encriptado con openssl_encrypt):</p>
                            <p class="text-heading mb-2 font-mono text-xs break-all">
                                <?php echo htmlspecialchars($_SESSION['datos_guardados']['telefono_encriptado']); ?>
                            </p>
                            <p class="text-xs text-secondary">
                                Visible:
                                <?php echo htmlspecialchars($_SESSION['datos_guardados']['telefono_visibles']); ?>
                            </p>
                        </div>
                    </div>

                    <?php else: ?>

                    <div class="rounded-lg border-2 border-dashed border-secondary/30 bg-secondary/10 p-6 text-center">
                        <p class="text-secondary">Ningún dato guardado aún.</p>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include VIEW_DIR . '/partials/__footer.php'; ?>
