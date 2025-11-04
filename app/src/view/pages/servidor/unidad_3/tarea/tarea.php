<?php
$title = 'Tarea unidad 3';
$arrayGenerado = [];
$mensaje = '';
$saludo = '';
$valor = '';

function generarArray($elemento): array
{
    $array = [];
    for ($i = $elemento; $i >= 0; $i--) {
        $array[] = $i;
    }
    return $array;
}

// Función genérica para generar tabla HTML
function generarTablaHTML(array $datos, array $columnas, string $metodo = 'POST'): string
{
    $html = '<table class="w-full table-auto border-collapse bg-white dark:bg-gray-800">';
    $html .= '<thead><tr class="bg-gray-100 dark:bg-gray-700">';

    foreach ($columnas as $col) {
        $html .=
            '<th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200">' .
            htmlspecialchars($col) .
            '</th>';
    }

    $html .= '</tr></thead><tbody>';

    foreach ($datos as $fila) {
        $html .= '<tr class="hover:bg-gray-50 dark:hover:bg-gray-700">';
        foreach ($fila as $celda) {
            $html .=
                '<td class="border border-gray-400 px-4 py-2 text-center text-gray-800 dark:text-gray-200">' .
                htmlspecialchars((string) $celda) .
                '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';
    $html .=
        '<p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">- Mediante ' .
        htmlspecialchars($metodo) .
        '</p>';

    return $html;
}

// Handle POST submissions (PRG pattern)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['edad'])) {
        $edad = intval($_POST['edad']);
        // Validar rango razonable de edad
        if ($edad < 0) {
            $_SESSION['mensaje'] = 'La edad no puede ser negativa. - Mediante POST';
        } elseif ($edad > 130) {
            $_SESSION['mensaje'] = 'La edad ingresada parece exorbitante. - Mediante POST';
        } else {
            if ($edad >= 18) {
                $_SESSION['mensaje'] = 'Eres mayor de edad. - Mediante POST';
            } else {
                $_SESSION['mensaje'] = 'Eres menor de edad. - Mediante POST';
            }
        }
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    if (isset($_POST['elemento'])) {
        $elemento = intval($_POST['elemento']);
        $_SESSION['arrayGenerado'] = generarArray($elemento);
        $_SESSION['arrayMetodo'] = ' - Mediante POST';
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    if (isset($_POST['nombre']) && isset($_POST['edad_saludo'])) {
        $nombre = trim($_POST['nombre']);
        $edad_saludo = intval($_POST['edad_saludo']);

        if (! empty($nombre) && $edad_saludo >= 0) {
            $_SESSION['saludo'] =
                'Hola ' . htmlspecialchars($nombre) . ', tienes ' . $edad_saludo . ' años - Mediante POST';
        } else {
            $_SESSION['saludo'] = 'Por favor, ingresa un nombre válido y una edad correcta. - Mediante POST';
        }

        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    if (isset($_POST['valores'])) {
        $valores = $_POST['valores'];
        $numeros = array_map('trim', explode(',', $valores));

        $datosTabla = [];
        foreach ($numeros as $numero) {
            if (is_numeric($numero)) {
                $datosTabla[] = [$numero, $numero * $numero];
            }
        }

        $_SESSION['tabla'] = generarTablaHTML($datosTabla, ['Número', 'Cuadrado'], 'POST');
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

    if (isset($_POST['valor'])) {
        $raw = trim((string) $_POST['valor']);

        if ($raw === '') {
            $_SESSION['valor_message'] = 'Introduzca un valor - Mediante POST';
        } elseif (! is_numeric($raw)) {
            $_SESSION['valor_message'] = 'Introduzca un valor numérico - Mediante POST';
        } else {
            $num = (int) $raw;
            if ($num < 0) {
                $_SESSION['valor_message'] = 'Introduzca un valor positivo - Mediante POST';
            } elseif ($num >= 0 && $num <= 10) {
                // Generar array completo y filtrar cada 3 elementos
                $arrayCompleto = generarArray($num);
                $arrayFiltrado = [];
                for ($i = 0; $i < count($arrayCompleto); $i += 3) {
                    $arrayFiltrado[] = [$arrayCompleto[$i]];
                }

                $_SESSION['tabla_valor'] = generarTablaHTML($arrayFiltrado, ['Valor'], 'POST');
            } elseif ($num > 10) {
                $_SESSION['valor_message'] = 'Número demasiado grande - Mediante POST';
            } else {
                $_SESSION['valor_message'] = 'Valor desconocido - Mediante POST';
            }
        }

        // Redirect to prevent form resubmission (PRG)
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

// Handle GET requests - show results from session (replace previous valor handling)
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Clear message after displaying
}

if (isset($_SESSION['arrayGenerado'])) {
    $arrayGenerado = $_SESSION['arrayGenerado'];
    $arrayMetodo = $_SESSION['arrayMetodo'] ?? '';
    unset($_SESSION['arrayGenerado']); // Clear array after displaying
    unset($_SESSION['arrayMetodo']);
}

if (isset($_SESSION['saludo'])) {
    $saludo = $_SESSION['saludo'];
    unset($_SESSION['saludo']); // Clear saludo after displaying
}

if (isset($_SESSION['tabla'])) {
    $tabla = $_SESSION['tabla'];
    unset($_SESSION['tabla']); // Clear table after displaying
}

// new: read valor-related session keys
$valor_message = null;
$tabla_valor = null;
if (isset($_SESSION['valor_message'])) {
    $valor_message = $_SESSION['valor_message'];
    unset($_SESSION['valor_message']);
}
if (isset($_SESSION['tabla_valor'])) {
    $tabla_valor = $_SESSION['tabla_valor'];
    unset($_SESSION['tabla_valor']);
}

if (isset($_SESSION['valor'])) {
    $mensaje_valor = 'El valor enviado es: ' . htmlspecialchars($_SESSION['valor']);
    unset($_SESSION['valor']);
}

$bienvenido = '';
if (isset($_GET['user'])) {
    $rawUser = trim((string) $_GET['user']);
    if ($rawUser === '') {
        $bienvenido = 'Bienvenido, invitado - Mediante GET';
    } else {
        $bienvenido = 'Bienvenido, ' . htmlspecialchars($rawUser) . ' - Mediante GET';
    }
}

$numeros_items = [];
for ($i = 1; $i <= 10; $i++) {
    $par = $i % 2 === 0 ? 'par' : 'impar';
    $numeros_items[] = $i . ' - ' . $par;
}

global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Tarea de unidad 3 - Programación Básica.</h1>
    </div>
    <main>
        <div class="max-x-6xl mx-auto mt-12 grid gap-16">
            <!-- Primera fila: 2 columnas -->
            <div class="grid grid-cols-2 gap-14">
                <div class="card">
                    <div class="text-title mb-4 text-center text-3xl font-semibold">
                        <h2>¿Eres mayor de edad?</h2>
                    </div>
                    <div>
                        <form action="" method="POST" id="edad_form">
                            <div>
                                <label class="form-label" for="edad">Ingresa tu edad!</label>
                                <input class="form-input" required type="number" name="edad" id="edad" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form">Enviar</button>
                            </div>
                        </form>

                        <?php if ($mensaje): ?>

                        <div
                            class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10"
                        >
                            <p class="text-lg font-semibold text-secondary">
                                <?php echo htmlspecialchars($mensaje); ?>
                            </p>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="card justify-start">
                    <div class="text-title mb-4 text-center text-3xl font-semibold">
                        <h2>Arrays!</h2>
                    </div>
                    <div>
                        <form action="" method="POST">
                            <div>
                                <label class="form-label" for="elemento">
                                    Dime un numero con el que generar el array
                                </label>
                                <input class="form-input" required type="number" name="elemento" id="elemento" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form">Generar array</button>
                            </div>
                        </form>
                        <div>
                            <?php if (!empty($arrayGenerado)): ?>

                            <div
                                class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10"
                            >
                                <h3 class="mb-4 text-xl font-semibold text-secondary">Array generado:</h3>
                                <p class="text-lg font-semibold text-secondary">
                                    <?php echo htmlspecialchars(implode(', ', $arrayGenerado)) . $arrayMetodo; ?>
                                </p>
                            </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda fila: 2 columnas -->
            <div class="grid grid-cols-2 gap-14">
                <div class="card">
                    <div class="text-title mb-6 text-center text-3xl font-semibold">
                        <h2>Saludo personalizado</h2>
                    </div>
                    <div>
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="form-label" for="nombre">Ingresa tu nombre:</label>
                                <input class="form-input" required type="text" name="nombre" id="nombre" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="edad_saludo">Ingresa tu edad:</label>
                                <input
                                    class="form-input"
                                    required
                                    type="number"
                                    name="edad_saludo"
                                    id="edad_saludo"
                                    min="0"
                                />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form">Generar saludo</button>
                            </div>
                        </form>

                        <?php if ($saludo): ?>

                        <div
                            class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center dark:border-accent-dark/30 dark:bg-accent-dark/10"
                        >
                            <p class="text-lg font-semibold text-secondary">
                                <?php echo $saludo; ?>
                            </p>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="text-title mb-6 text-center text-3xl font-semibold">
                        <h2>Crear una tabla en base a un bucle</h2>
                    </div>
                    <div>
                        <form action="" method="POST">
                            <div>
                                <label class="form-label" for="valores">Ingresa números separados por comas:</label>
                                <input class="form-input" required type="text" name="valores" id="valores" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form">Crear tabla</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <?php if (isset($tabla)): ?>

                        <div class="text-center">
                            <h3 class="mt-6 mb-2 text-xl font-semibold text-secondary">Tabla generada:</h3>
                            <div
                                class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 dark:border-accent-dark/30 dark:bg-accent-dark/10"
                            >
                                <?php echo $tabla; ?>
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- single centered card block -->
            <div class="flex justify-center">
                <div class="mx-auto w-full max-w-[38rem] md:w-1/2">
                    <div class="card">
                        <?php if (empty($valor_message) && empty($tabla_valor)): ?>

                        <!-- No parameter/result: show form and the H2 notice -->
                        <h2 class="text-heading mb-4 text-center text-2xl font-semibold">
                            No se ha introducido ningún valor
                        </h2>
                        <form action="" method="POST">
                            <div>
                                <label for="valor" class="form-label">Valor:</label>
                                <input type="text" name="valor" id="valor" class="form-input" />
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn-form">Enviar</button>
                            </div>
                        </form>

                        <?php else: ?>

                        <!-- Result exists: hide the form and show only results -->

                        <?php if (!empty($valor_message)): ?>

                        <div class="text-center">
                            <h3 class="mt-2 mb-2 text-xl font-semibold text-secondary">Resultado</h3>
                            <p class="text-lg font-semibold text-secondary">
                                <?php echo htmlspecialchars($valor_message); ?>
                            </p>
                        </div>

                        <?php endif; ?>

                        <?php if (!empty($tabla_valor)): ?>

                        <div class="text-center">
                            <h3 class="mt-6 mb-2 text-xl font-semibold text-secondary">Tabla generada:</h3>
                            <div
                                class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 dark:border-accent-dark/30 dark:bg-accent-dark/10"
                            >
                                <?php echo $tabla_valor; ?>
                            </div>
                        </div>

                        <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-14">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Enlace GET — Bienvenida</h2>
                    <p class="mb-4 text-secondary">Introduce tu nombre y envíalo por GET:</p>

                    <form method="GET" action="" class="space-y-4">
                        <div>
                            <label for="user" class="form-label">Nombre:</label>
                            <input id="user" name="user" type="text" class="form-input" />
                        </div>
                        <div>
                            <button type="submit" class="btn-form">Enviar nombre (GET)</button>
                        </div>
                    </form>

                    <?php if (!empty($bienvenido)): ?>

                    <div class="mt-6 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-4 text-center">
                        <p class="text-lg font-semibold text-secondary"><?php echo $bienvenido; ?></p>
                    </div>

                    <?php endif; ?>
                </div>

                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Bucle for — Números 1 a 10</h2>
                    <p class="mb-4 text-secondary">Lista generada en PHP con for indicando par/impar:</p>
                    <div>
                        <ol class="list-inside list-decimal space-y-1 text-secondary">
                            <?php foreach ($numeros_items as $item): ?>

                            <li class="text-secondary"><?php echo htmlspecialchars($item); ?></li>

                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
