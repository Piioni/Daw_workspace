<?php
$title = 'Homepage Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Desarrollo Web en entorno Cliente</h1>
        <div class="text-secondary mt-4 text-3xl">
            <p>Última actualización - 16 octubre, tarea unidad 2</p>
        </div>
    </div>
    <main>
        <div class="auto-grid">
            <div class="flex flex-col">
                <div class="card">
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
                                <a class="nav-internal-link" href="/cliente/1/navegadores">
                                    Teórico sobre navegadores web
                                </a>
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
            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 2</h2>
                    <p class="text-secondary mb-4">Javascript Básico</p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="text-secondary list-inside list-disc space-y-2">
                            <li>
                                <a class="nav-internal-link" href="/cliente/2/tarea">Tarea de unidad!</a>
                            </li>
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
            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 3</h2>
                    <p class="text-secondary mb-4">En desarrollo</p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="text-secondary list-inside list-disc space-y-2">
                            <li>
                                <a class="nav-internal-link" href="/cliente/3/objetos">Objetos predefinidos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
