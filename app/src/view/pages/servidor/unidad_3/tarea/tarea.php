<?php
$title = 'Tarea unidad 3';
$arrayGenerado = [];
$mensaje = '';
$saludo = '';

function generarArray($elemento): array
{
    $array = [];
    for ($i = $elemento; $i >= 0; $i--) {
        $array[] = $i;
    }
    return $array;
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
            $_SESSION['saludo'] = 'Hola ' . htmlspecialchars($nombre) . ', tienes ' . $edad_saludo . ' años - Mediante POST';
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

        // Generate only the table HTML without the container div
        $tablaHTML = '<table class="w-full table-auto border-collapse bg-white dark:bg-gray-800">';
        $tablaHTML .= '<thead><tr class="bg-gray-100 dark:bg-gray-700">';
        $tablaHTML .= '<th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200">Número</th>';
        $tablaHTML .= '<th class="border border-gray-400 px-4 py-2 text-gray-800 dark:text-gray-200">Cuadrado</th>';
        $tablaHTML .= '</tr></thead><tbody>';

        foreach ($numeros as $numero) {
            if (is_numeric($numero)) {
                $cuadrado = $numero * $numero;
                $tablaHTML .= '<tr class="hover:bg-gray-50 dark:hover:bg-gray-700">';
                $tablaHTML .=
                    '<td class="border border-gray-400 px-4 py-2 text-center text-gray-800 dark:text-gray-200">' .
                    htmlspecialchars($numero) .
                    '</td>';
                $tablaHTML .=
                    '<td class="border border-gray-400 px-4 py-2 text-center text-gray-800 dark:text-gray-200">' .
                    htmlspecialchars($cuadrado) .
                    '</td>';
                $tablaHTML .= '</tr>';
            }
        }

        $tablaHTML .= '</tbody></table>';
        $tablaHTML .= '<p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">- Mediante POST</p>';

        $_SESSION['tabla'] = $tablaHTML;

        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

// Handle GET requests - show results from session
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Clear message after displaying
}

if (isset($_SESSION['arrayGenerado'])) {
    $arrayGenerado = $_SESSION['arrayGenerado'];
    $arrayMetodo = isset($_SESSION['arrayMetodo']) ? $_SESSION['arrayMetodo'] : '';
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
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
