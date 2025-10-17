<?php
$title = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Desarrollo Web en entorno Servidor</h1>
        <div class="mt-4 text-2xl text-secondary">
            <p>Última actualización: 10/3/2025</p>
        </div>
    </div>
    <div class="mx-8 mt-12 flex flex-wrap justify-around gap-2">
        <div class="min-w-[400px] flex-1 md:max-w-1/3">
            <div
                class="h-full rounded-lg border border-border bg-secondary p-6 px-10 shadow-lg dark:border-border-dark dark:bg-secondary-dark"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 1</h2>
                <p class="mb-4 text-secondary">
                    En esta unidad vimos conceptos básicos como variables, loops, arrays, funciones, métodos del
                    servidor.
                </p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="list-inside list-disc space-y-2 text-secondary">
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
                class="h-full rounded-lg border border-border bg-secondary p-6 px-10 shadow-lg dark:border-border-dark dark:bg-secondary-dark"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 2</h2>
                <p class="mb-4 text-secondary">Métodos GET y POST, formularios, web dinámica.</p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="list-inside list-disc space-y-2 text-secondary">
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
