<?php
$title = 'Pagina web dinámica';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nombre = $_GET['nombre'] ?? 'Invitado';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre_contacto'] ?? 'Invitado';
    } else {
        $nombre = 'Invitado';
    }
}

$frutas = [
    'Manzana' => '2$',
    'Plátano' => '1.5$',
    'Naranja' => '2.5$',
    'Fresa' => '3$',
    'Uva' => '2.8$',
];

$productos = [
    ['nombre' => 'Producto 1', 'precio' => '10$', 'cantidad' => 5],
    ['nombre' => 'Producto 2', 'precio' => '20$', 'cantidad' => 3],
    ['nombre' => 'Producto 3', 'precio' => '15$', 'cantidad' => 8],
    ['nombre' => 'Producto 4', 'precio' => '30$', 'cantidad' => 2],
    ['nombre' => 'Producto 5', 'precio' => '25$', 'cantidad' => 6],
];

global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="mt-10 text-center text-4xl font-semibold">
        <h1>Pagina web dinámica</h1>
    </div>
    <div class="mx-auto mt-12 grid w-full max-w-4xl auto-rows-fr grid-cols-1 grid-rows-[auto] gap-6 md:grid-cols-2">
        <div class="card">
            <div class="text-secondary text-2xl font-semibold">
                <h2><?php echo 'Bienvenido a la pagina, ' . htmlspecialchars($nombre); ?></h2>
            </div>
            <div class="mt-6">
                <form action="" method="get">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-input" required />
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="btn-form">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Mostrar la fecha actual utilizando la funcion date de PHP:</h2>
            </div>
            <div class="mt-10 text-lg">
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
                <h2>Listado de frutas con su precio:</h2>
            </div>
            <div class="mt-6 flex w-full items-start">
                <ul class="text-secondary list-inside list-disc space-y-2">
                    <?php foreach ($frutas as $fruta => $precio): ?>

                    <li><?php echo htmlspecialchars($fruta) . ' - ' . htmlspecialchars($precio); ?></li>

                    <?php endforeach; ?>
                </ul>
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
            <div class="text-secondary mt-6 text-2xl font-semibold">
                <h2><?php echo 'Bienvenido a la pagina, ' . htmlspecialchars($nombre); ?></h2>
            </div>
        </div>

        <div class="card">
            <div class="text-semibold text-2xl">
                <h2>Tabla de productos:</h2>
            </div>
            <div class="mt-6">
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-b border-gray-300 px-4 py-2 text-left">Nombre</th>
                            <th class="border-b border-gray-300 px-4 py-2 text-left">Precio</th>
                            <th class="border-b border-gray-300 px-4 py-2 text-left">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>

                        <tr class="hover:bg-gray-100">
                            <td class="border-b border-gray-300 px-4 py-2">
                                <?php echo htmlspecialchars($producto['nombre']); ?>
                            </td>
                            <td class="border-b border-gray-300 px-4 py-2">
                                <?php echo htmlspecialchars($producto['precio']); ?>
                            </td>
                            <td class="border-b border-gray-300 px-4 py-2">
                                <?php echo htmlspecialchars($producto['cantidad']); ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
