<?php
$title = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Desarrollo Web en entorno Servidor</h1>
        <div class="text-secondary mt-4 text-2xl">
            <p>Última actualización: 10/3/2025</p>
        </div>
    </div>
    <div class="mx-8 mt-12 flex flex-wrap justify-around gap-2">
        <div class="min-w-[400px] flex-1 md:max-w-1/3">
            <div
                class="bg-secondary border-border dark:bg-secondary-dark dark:border-border-dark h-full rounded-lg border p-6 px-10 shadow-lg"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 1</h2>
                <p class="text-secondary mb-4">
                    En esta unidad vimos conceptos básicos como variables, loops, arrays, funciones, métodos del
                    servidor.
                </p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="text-secondary list-inside list-disc space-y-2">
                        <li>
                            <a class="nav-internal-link" href="/servidor/1/tarea">Ejercicios de tarea: To-do list.</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/servidor/1/php">Primeros ejercicios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="min-w-[400px] flex-1 md:max-w-1/3 md:min-w-0.5">
            <div
                class="bg-secondary border-border dark:bg-secondary-dark dark:border-border-dark h-full rounded-lg border p-6 px-10 shadow-lg"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 2</h2>
                <p class="text-secondary mb-4">Métodos GET y POST, formularios, web dinámica.</p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="text-secondary list-inside list-disc space-y-2">
                        <li>
                            <a class="nav-internal-link" href="/servidor/2/tarea">Tarea</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/servidor/2/dinamic_web">Pagina web dinámica</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
