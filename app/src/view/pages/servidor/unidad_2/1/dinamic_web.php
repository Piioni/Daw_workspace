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
    'Uva' => '2.8$'
];

$productos = [
    ['nombre' => 'Producto 1', 'precio' => '10$', 'cantidad' => 5],
    ['nombre' => 'Producto 2', 'precio' => '20$', 'cantidad' => 3],
    ['nombre' => 'Producto 3', 'precio' => '15$', 'cantidad' => 8],
    ['nombre' => 'Producto 4', 'precio' => '30$', 'cantidad' => 2],
    ['nombre' => 'Producto 5', 'precio' => '25$', 'cantidad' => 6],
];

global $VIEW_DIR;
include $VIEW_DIR.'/partials/__header.php';
?>

  <div class="w-full mb-15">
    <div class="text-4xl font-semibold text-center mt-10 ">
      <h1>Pagina web dinámica</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl w-full mx-auto mt-12 grid-rows-[auto] auto-rows-fr">
      <div class="card">
        <div class="text-secondary text-2xl font-semibold">
          <h2><?php echo "Bienvenido a la pagina, ".htmlspecialchars($nombre) ?></h2>
        </div>
        <div class="mt-6">
          <form action="" method="get">
            <div class="form-group">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" id="nombre" name="nombre" class="form-input" required>
            </div>
            <div class="mt-4 flex justify-center">
              <button type="submit" class="btn-form">
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="text-semibold text-2xl">
          <h2>
            Mostrar la fecha actual utilizando la funcion date de PHP:
          </h2>
        </div>
        <div class="mt-10 text-lg ">
          <h2>
              <?php
              setlocale(LC_TIME, 'es_ES.UTF-8');
              $fecha_actual = date('l j \d\e F \d\e Y');
              echo "Hoy es ".($fecha_actual);
              ?>
          </h2>
        </div>
      </div>
      <div class="card">
        <div class="text-semibold text-2xl">
          <h2>
            Listado de frutas con su precio:
          </h2>
        </div>
        <div class="flex items-start mt-6 w-full">
          <ul class="list-disc list-inside text-secondary space-y-2">
              <?php foreach ($frutas as $fruta => $precio): ?>
                <li><?php echo htmlspecialchars($fruta).' - '.htmlspecialchars($precio); ?></li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="card">
        <div class="text-semibold text-2xl">
          <h2>
            Formulario de contacto (método POST):
          </h2>
        </div>
        <div class="mt-6">
          <form action="" method="post">
            <div class="form-group">
              <label for="nombre_contacto" class="form-label">Nombre:</label>
              <input type="text" id="nombre_contacto" name="nombre_contacto" class="form-input"
                     required>
            </div>
            <div class="mt-4 flex justify-center">
              <button type="submit" class="btn-form">Enviar</button>
            </div>
          </form>
        </div>
        <div class="text-secondary text-2xl font-semibold mt-6">
          <h2><?php echo "Bienvenido a la pagina, ".htmlspecialchars($nombre) ?></h2>
        </div>
      </div>

      <div class="card">
        <div class="text-semibold text-2xl">
          <h2>
            Tabla de productos:
          </h2>
        </div>
        <div class="mt-6">
          <table class="min-w-full border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
              <th class="py-2 px-4 border-b border-gray-300 text-left">Nombre</th>
              <th class="py-2 px-4 border-b border-gray-300 text-left">Precio</th>
              <th class="py-2 px-4 border-b border-gray-300 text-left">Cantidad</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto): ?>
              <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b border-gray-300"><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td class="py-2 px-4 border-b border-gray-300"><?php echo htmlspecialchars($producto['precio']); ?></td>
                <td class="py-2 px-4 border-b border-gray-300"><?php echo htmlspecialchars($producto['cantidad']); ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


<?php
include $VIEW_DIR.'/partials/__footer.php';
?>