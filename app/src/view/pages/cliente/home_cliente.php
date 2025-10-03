<?php
$title = 'Homepage Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

    <div class="w-full mb-15">
        <div class="flex flex-col items-center justify-center text-heading text-6xl font-semibold text-center mt-10 py-2">
            <h1>Desarrollo Web en entorno Cliente</h1>
            <div class="text-secondary text-2xl mt-4">
                <p>Última actualización: 03 octubre - Tailwind css.</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-around mt-12 gap-2 mx-8">
            <div class="flex-1 md:max-w-1/3 min-w-[400px]">
                <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 h-full">
                    <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 1</h2>
                    <p class="mb-4 text-secondary">Ejercicios básicos sobre interactividad, manipulación de estilos y
                        windows.onload
                    </p>
                    <div>
                        <h3 class="text-xl font-semibold mb-2 text-heading">Ejercicios:</h3>
                        <ul class="list-disc list-inside text-secondary space-y-2">
                            <li>
                                <a class="nav-internal-link" href="/cliente/1/tarea">
                                    Ejercicios de tarea
                                </a>
                            </li>
                            <li>
                                <a class="nav-internal-link" href="/cliente/1/ejercicios">
                                    Primeros ejercicios
                                </a>
                            </li>
                            <li>
                                <a class="nav-internal-link" href="/cliente/1/navegadores">
                                    Teórico sobre navegadores web
                                </a>
                            </li>
                            <li>
                                <a class="nav-internal-link" href="/cliente/1/interactivo">
                                    Ejercicio interactivo
                                </a>
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
            <div class="flex-1 md:max-w-1/3 min-w-[400px] md:min-w-0.5 ">
                <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 h-full ">
                    <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 2</h2>
                    <p class="mb-4 text-secondary"> Javascript Básico
                    </p>
                    <div>
                        <h3 class="text-xl font-semibold mb-2 text-heading">Ejercicios:</h3>
                        <ul class="list-disc list-inside text-secondary space-y-2">
                            <li>
                                <a class="nav-internal-link" href="/cliente/2/js">
                                    Primeros ejercicios
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>