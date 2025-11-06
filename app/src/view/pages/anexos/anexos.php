<?php
$title = 'Anexos - Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Anexos - Desarrollo Web en entorno Cliente</h1>
        <div class="mt-4 text-3xl text-secondary">
            <p>Última actualización: 10/3/2025</p>
        </div>
    </div>

    <main>
        <div class="auto-grid">
            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">jQuery</h2>
                    <p class="mb-4 text-secondary">
                        Biblioteca JavaScript para simplificar la manipulación del DOM, eventos y animaciones.
                    </p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/cliente/anexos/jquery">Ejercicios de jQuery</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="card">
                    <h2 class="text-heading mb-4 text-2xl font-semibold">Angular</h2>
                    <p class="mb-4 text-secondary">
                        Framework de JavaScript para construir aplicaciones web dinámicas y escalables.
                    </p>
                    <div>
                        <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                        <ul class="list-inside list-disc space-y-2 text-secondary">
                            <li>
                                <a class="nav-internal-link" href="/cliente/anexos/angular">Ejercicios de Angular</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include $VIEW_DIR . '/partials/__footer.php'; ?>
