<?php
$titulo = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mx-auto p-10 min-h-screen ">
    <div class="flex flex-col items-center justify-center py-2">
        <h1 class="text-primary text-4xl font-bold text-center">
            Página de inicio de la sección de Servidor
        </h1>
    </div>
    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4">Unidad 1</h2>
        <p class="mb-4">En esta unidad vimos conceptos básicos como variables, loops, arrays, funciones, metodos del servidor.</p>
    </div>

</div>


<ul>
    <li><a href="/servidor/1/tarea"> Ejercicios de tarea: To-do list.</a></li>
    <li><a href="/servidor/1/php">Primeros ejercicios</a></li>
</ul>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
