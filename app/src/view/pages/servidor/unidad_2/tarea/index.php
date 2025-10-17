<?php
$title = 'Servidor - Unidad 2 - Tarea';
$resultado = ' Primero realiza una operación. ';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_contacto'] ?? 'Invitado';

    if (isset($_POST['num1'], $_POST['num2'], $_POST['operador'])) {
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $operador = $_POST['operador'];

        switch ($operador) {
            case 'sumar':
                $resultado = $num1 + $num2;
                break;
            case 'restar':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;
            case 'dividir':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $resultado = 'Error: División por cero';
                }
                break;
            default:
                $resultado = 'Operación no válida';
        }
    }
} else {
    $nombre = 'Invitado';
}

$archivo_productos = __DIR__ . '/productos.txt';
if (! file_exists($archivo_productos)) {
    touch($archivo_productos);
}
$productos = file($archivo_productos, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

global $VIEW_DIR;
require $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="mt-10 text-center text-6xl font-semibold">
        <h1>Tarea 2 unidad.</h1>
    </div>
    <div class="mx-auto mt-12 grid w-full max-w-5xl auto-rows-fr grid-cols-1 grid-rows-[auto] gap-10 md:grid-cols-2">
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Mostrar la fecha actual utilizando la funcion date de PHP:</h2>
            </div>
            <div class="mt-20 text-lg">
                <h2>
                    <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    $fecha_actual = date('l j \d\e F \d\e Y');
                    echo 'Hoy es ' . $fecha_actual;
                    ?>
                </h2>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Formulario de contacto (método POST):</h2>
            </div>
            <div class="mt-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nombre_contacto" class="form-label">Nombre:</label>
                        <input type="text" id="nombre_contacto" name="nombre_contacto" class="form-input" required />
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="btn-form">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="mt-6 text-2xl font-semibold text-secondary">
                <h2><?php echo 'Bienvenido a la pagina, ' . htmlspecialchars($nombre); ?></h2>
            </div>
        </div>

        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Listado de productos desde un archivo de texto:</h2>
            </div>
            <div class="align-center mt-6 flex h-full flex-col justify-center p-10 text-lg">
                <table>
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Producto</th>
                            <th class="border px-4 py-2">Precio</th>
                        </tr>
                    </thead>

                    <?php if ($productos): ?>

                    <tbody>
                        <?php foreach ($productos as $producto):
                  list($nombre, $precio) = explode(',', $producto);
                  ?>

                        <tr>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($nombre); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($precio); ?> €</td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>

                    <?php else: ?>

                    <tr>
                        <td class="border px-4 py-2" colspan="2">No hay productos disponibles.</td>
                    </tr>

                    <?php endif ?>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Formas de embedir código PHP en HTML:</h2>
            </div>
            <div class="mt-6 text-sm">
                <p class="mb-4">Principales métodos para embeber PHP:</p>
                <div class="space-y-4">
                    <div>
                        <strong class="text-base">1. Etiquetas estándar:</strong>
                        <div class="mt-2">
                            <code class="block rounded bg-gray-100 px-3 py-2 text-xs">
                                &lt;?php echo "Hola!"; ?&gt;
                            </code>
                        </div>
                    </div>
                    <div>
                        <strong class="text-base">2. Etiquetas cortas:</strong>
                        <div class="mt-2">
                            <code class="block rounded bg-gray-100 px-3 py-2 text-xs">&lt;?= "Hola!" ?&gt;</code>
                        </div>
                    </div>
                    <div>
                        <strong class="text-base">3. En atributos:</strong>
                        <div class="mt-2">
                            <code class="block rounded bg-gray-100 px-3 py-2 text-xs">
                                &lt;a href="page.php?id=&lt;?= $id ?&gt;"&gt;Link&lt;/a&gt;
                            </code>
                        </div>
                    </div>
                    <div>
                        <strong class="text-base">4. Bloques condicionales:</strong>
                        <div class="mt-2">
                            <code class="block rounded bg-gray-100 px-3 py-2 text-xs">
                                &lt;?php if ($show): ?&gt;
                                <br />
                                &nbsp;&nbsp;&lt;div&gt;Contenido&lt;/div&gt;
                                <br />
                                &lt;?php endif; ?&gt;
                            </code>
                        </div>
                    </div>
                </div>
                <p class="mt-4 text-xs text-gray-600">* Las etiquetas cortas requieren configuración habilitada</p>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Calculadora simple (suma dos números):</h2>
            </div>
            <div class="mt-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="num1" class="form-label">Número 1:</label>
                        <input type="number" id="num1" name="num1" class="form-input" required />
                    </div>
                    <div class="form-group mt-4">
                        <label for="num2" class="form-label">Número 2:</label>
                        <input type="number" id="num2" name="num2" class="form-input" required />
                    </div>
                    <div class="form-group mt-4">
                        <label for="operador" class="form-label">Operación a realizar:</label>
                        <select id="operador" name="operador" class="form-select">
                            <option value="sumar">Sumar</option>
                            <option value="restar">Restar</option>
                            <option value="multiplicar">Multiplicar</option>
                            <option value="dividir">Dividir</option>
                        </select>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="btn-form">Calcular</button>
                    </div>
                </form>
            </div>
            <div class="mt-6 text-left text-2xl font-semibold text-secondary">
                <?php if ($resultado !== null): ?>

                <div class="mt-6 text-center text-lg font-semibold">
                    <h2>
                        Resultado:

                        <?php echo is_numeric($resultado) ? number_format($resultado, 2) : $resultado; ?>
                    </h2>
                </div>

                <?php endif; ?>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Sentencias simples:</h2>
            </div>
            <div class="align-center mt-6 flex h-full flex-col justify-center text-lg">
                <div class="mb-20 text-lg font-semibold text-secondary">
                    <h3>Rangel Carmona Juan Esteban! Z0079225H</h3>
                </div>
                <div class="mb-4 text-lg font-semibold text-secondary">
                    El código del script php siempre se incluye entre las etiquetas &lt;?php ?&gt;.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Tipos de variables</h2>
            </div>

            <?php
            $entero = 10;
            $flotante = 8.22;
            $booleano = true;
            $cadena = 'Cadena!';
            const PI = 3.1416;
            ?>

            <div class="align-center mt-6 flex h-full flex-col justify-center text-lg">
                <ul class="list-inside list-disc space-y-2 text-secondary">
                    <li>
                        <strong>Entero:</strong>

                        <?php echo $entero; ?>

                        (Tipo: <?php echo gettype($entero); ?>)
                    </li>
                    <li>
                        <strong>Flotante:</strong>

                        <?php echo $flotante; ?>

                        (Tipo: <?php echo gettype($flotante); ?>)
                    </li>
                    <li>
                        <strong>Booleano:</strong>

                        <?php echo $booleano ? 'true' : 'false'; ?>

                        (Tipo: <?php echo gettype($booleano); ?>)
                    </li>
                    <li>
                        <strong>Cadena:</strong>

                        <?php echo $cadena; ?>

                        (Tipo: <?php echo gettype($cadena); ?>)
                    </li>
                    <li>
                        <strong>Constante PI:</strong>

                        <?php echo PI; ?>

                        (Tipo: <?php echo gettype(PI); ?>)
                    </li>
                    <li class="mt-10">
                        <strong>Operación suma:</strong>

                        <?php echo $entero + $flotante; ?>
                    </li>
                </ul>
                <br />
            </div>
        </div>
        <div class="card">
            <?php
            $GLOBALS['mensaje'] = 'Hola desde variable global!';

            function monstrar_mensaje(): void
            {
                global $mensaje;
                $mensaje_adicional = ' y un mensaje adicional.';
                echo $mensaje . $mensaje_adicional;
            }

            ?>

            <div class="text-semibold text-2xl">
                <h2>Variables globales y locales en funciones:</h2>
            </div>
            <div class="align-center mt-6 flex h-full flex-col justify-center text-lg">
                <div class="mb-4 text-lg font-semibold text-secondary">
                    <h3>
                        <?php monstrar_mensaje(); ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require $VIEW_DIR . '/partials/__footer.php';
?>
