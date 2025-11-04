<?php
$title = 'Ejercicios de Sesiones';

// Ejercicio 1: Contador de visitas
if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 1;
    $esPrimeraVisita = true;
} else {
    $_SESSION['visitas']++;
    $esPrimeraVisita = false;
}

// Ejercicio 2: Formulario de nombre
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
    if (!empty($nombre)) {
        $_SESSION['nombre_usuario'] = htmlspecialchars($nombre);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

// Ejercicio 3: Timestamp de inicio de sesión
if (!isset($_SESSION['inicio_sesion'])) {
    $_SESSION['inicio_sesion'] = time();
}

// Calcular tiempo activo
$tiempoActivo = time() - $_SESSION['inicio_sesion'];
$horas = floor($tiempoActivo / 3600);
$minutos = floor(($tiempoActivo % 3600) / 60);
$segundos = $tiempoActivo % 60;

global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full flex flex-col flex-1">
    <div class="hero">
        <h1>Sesiones en PHP</h1>
    </div>

    <main class="flex-1 flex items-center">
        <div class="max-w-6xl mx-auto w-full py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Card 1: Contador de visitas -->
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold text-center">Contador de Visitas</h2>

                    <?php if ($esPrimeraVisita): ?>
                        <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-6 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10">
                            <p class="text-2xl font-bold text-heading mb-2">¡Bienvenido!</p>
                            <p class="text-lg text-secondary">Esta es tu primera visita a esta página.</p>
                        </div>
                    <?php else: ?>
                        <div class="rounded-lg border-2 border-dashed border-primary/30 bg-primary/10 p-6 text-center dark:border-primary-dark/30 dark:bg-primary-dark/10">
                            <p class="text-lg text-heading mb-2">Has visitado esta página:</p>
                            <p class="text-6xl font-bold text-heading my-4"><?php echo $_SESSION['visitas']; ?></p>
                            <p class="text-xl font-semibold text-heading mt-2">
                                <?php echo $_SESSION['visitas'] == 1 ? 'vez' : 'veces'; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Card 2: Formulario de nombre -->
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold text-center">Saludo Personalizado</h2>

                    <?php if (!isset($_SESSION['nombre_usuario'])): ?>
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="form-label" for="nombre">¿Cómo te llamas?</label>
                                <input
                                    class="form-input"
                                    required
                                    type="text"
                                    name="nombre"
                                    id="nombre"
                                    placeholder="Introduce tu nombre"
                                />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form w-full">Guardar nombre</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-6 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10">
                            <p class="text-2xl font-bold text-heading mb-4">¡Hola!</p>
                            <p class="text-4xl font-bold text-heading my-6">
                                <?php echo $_SESSION['nombre_usuario']; ?>
                            </p>
                            <p class="text-sm text-secondary">Tu nombre está guardado en la sesión</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Card 3: Timestamp de sesión -->
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold text-center">Información de Sesión</h2>

                    <div class="space-y-4">
                        <div class="rounded-lg border-2 border-dashed border-primary/30 bg-primary/10 p-4 dark:border-primary-dark/30 dark:bg-primary-dark/10">
                            <p class="text-sm text-secondary mb-1">Inicio de sesión:</p>
                            <p class="text-lg font-bold text-heading">
                                <?php echo date('d/m/Y H:i:s', $_SESSION['inicio_sesion']); ?>
                            </p>
                        </div>

                        <div class="rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 dark:border-accent-dark/30 dark:bg-accent-dark/10">
                            <p class="text-sm text-secondary mb-2">Tiempo activo:</p>
                            <div class="flex justify-center gap-4">
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-heading"><?php echo $horas; ?></p>
                                    <p class="text-xs text-secondary">horas</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-heading"><?php echo $minutos; ?></p>
                                    <p class="text-xs text-secondary">minutos</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-heading"><?php echo $segundos; ?></p>
                                    <p class="text-xs text-secondary">segundos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
