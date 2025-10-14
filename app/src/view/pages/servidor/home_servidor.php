<?php
$title = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR.'/partials/__header.php';
?>

<div class="w-full"
<div class="flex flex-col items-center justify-center text-heading text-6xl font-semibold text-center mt-10 py-2">
  <h1>Desarrollo Web en entorno Servidor</h1>
  <div class="text-secondary text-2xl mt-4">
    <p>Última actualización: 10/3/2025</p>
  </div>
</div>
<div class="flex flex-wrap justify-around mt-12 gap-2 mx-8">
  <div class="flex-1 md:max-w-1/3 min-w-[400px]">
    <div
        class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 h-full">
      <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 1</h2>
      <p class="mb-4 text-secondary">En esta unidad vimos conceptos básicos como variables, loops, arrays,
        funciones, métodos del servidor.</p>
      <div>
        <h3 class="text-xl font-semibold mb-2 text-heading">Ejercicios:</h3>
        <ul class="list-disc list-inside text-secondary space-y-2">
          <li>
            <a class="nav-internal-link" href="/servidor/1/tarea">
              Ejercicios de tarea: To-do list.
            </a>
          </li>
          <li>
            <a class="nav-internal-link" href="/servidor/1/php">
              Primeros ejercicios con PHP;
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="flex-1 md:max-w-1/3 min-w-[400px] md:min-w-0.5 ">
    <div
        class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 h-full ">
      <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 2</h2>
      <p class="mb-4 text-secondary"> Métodos GET y POST, formularios, web dinámica.
      </p>
      <div>
        <h3 class="text-xl font-semibold mb-2 text-heading">Ejercicios:</h3>
        <ul class="list-disc list-inside text-secondary space-y-2">
          <li>
            <a class="nav-internal-link" href="/servidor/2/tarea">
              Tarea
            </a>
          </li>
          <li>
            <a class="nav-internal-link" href="/servidor/2/dinamic_web">
              Pagina web dinámica
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
include $VIEW_DIR.'/partials/__footer.php';
?>
