<?php
$title = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Desarrollo Web en entorno Servidor</h1>
        <div class="mt-4 text-3xl text-secondary">
            <p>Última actualización: 10/3/2025</p>
        </div>
    </div>

    <main>
        <div class="auto-grid">
            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 1</h2>
                    <p class="mb-4 text-secondary">
                        En esta unidad vimos conceptos básicos como variables, loops, arrays, funciones, métodos del
                        servidor.
                    </p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/servidor/1/tarea">
                                    Ejercicios de tarea: To-do list.
                                </a>
                            </li>
                            <li>
                                <a class="nav-internal-link" href="/servidor/1/php">Primeros ejercicios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 2</h2>
                    <p class="mb-4 text-secondary">Métodos GET y POST, formularios, web dinámica.</p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/servidor/2/tarea">Tarea</a>
                            </li>
                            <li>
                                <a class="nav-internal-link" href="/servidor/2/dinamic_web">Página web dinámica</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 3</h2>
                    <p class="mb-4 text-secondary">Programación básica en php, bucles listas y demas</p>
                    <div>
                        <h2 class="text-heading mb-2 text-xl font-semibold">Tarea</h2>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/servidor/3/tarea">Tarea: Sistema de login básico</a>
                            </li
                        </ul>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/servidor/3/ejercicios">
                                    Ejercicios sobre PHP
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
