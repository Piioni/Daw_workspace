<?php
$title = 'Homepage Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Desarrollo Web en entorno Cliente</h1>
        <div class="text-secondary mt-4 text-2xl">
            <p>Última actualización: 03 octubre - Tailwind css.</p>
        </div>
    </div>
    <div class="mx-8 mt-12 flex flex-wrap justify-around gap-2">
        <div class="min-w-[400px] flex-1 md:max-w-1/3">
            <div
                class="border-border bg-secondary dark:border-border-dark dark:bg-secondary-dark h-full rounded-lg border p-6 px-10 shadow-lg"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 1</h2>
                <p class="text-secondary mb-4">
                    Ejercicios básicos sobre interactividad, manipulación de estilos y windows.onload
                </p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="text-secondary list-inside list-disc space-y-2">
                        <li>
                            <a class="nav-internal-link" href="/cliente/1/tarea">Ejercicios de tarea</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/cliente/1/ejercicios">Primeros ejercicios</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/cliente/1/navegadores">Teórico sobre navegadores web</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/cliente/1/interactivo">Ejercicio interactivo</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/cliente/1/loaded">
                                Ejercicios: Relacionados con windows onload y getElementById.
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="min-w-[400px] flex-1 md:max-w-1/3 md:min-w-0.5">
            <div
                class="border-border bg-secondary dark:border-border-dark dark:bg-secondary-dark h-full rounded-lg border p-6 px-10 shadow-lg"
            >
                <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 2</h2>
                <p class="text-secondary mb-4">Javascript Básico</p>
                <div>
                    <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                    <ul class="text-secondary list-inside list-disc space-y-2">
                        <li>
                            <a class="nav-internal-link" href="/cliente/2/js1">Primeros ejercicios</a>
                        </li>
                        <li>
                            <a class="nav-internal-link" href="/cliente/2/js2">Segundos ejercicios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
