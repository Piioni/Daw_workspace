<?php
$title = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="flex flex-col items-center justify-center text-heading text-6xl font-semibold text-center mt-10 py-2">
        <h1>Desarrollo Web en entorno Servidor</h1>
        <div class="text-secondary text-2xl mt-4">
            <p>Última actualización: 10/3/2025</p>
        </div>
    </div>
    <div class="flex mt-10 mx-20">
        <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg max-w-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 1</h2>
            <p class="mb-4 text-secondary">En esta unidad vimos conceptos básicos como variables, loops, arrays, funciones, métodos del servidor.</p>
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
                            Primeros ejercicios
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
