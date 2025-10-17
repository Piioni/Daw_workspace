<?php
$title = 'Homepage Diseño';
global $VIEW_DIR;
require $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Desarrollo Web - Diseño</h1>
        <div class="mt-4 text-2xl text-secondary">
            <p>Página de inicio de la sección de Diseño</p>
        </div>
    </div>
    <div class="mx-20 mt-10 flex">
        <div class="unit-card max-w-lg">
            <h2 class="text-heading mb-4 text-2xl font-semibold">Unidad 1</h2>
            <p class="mb-4 text-secondary">Ejercicios sobre formularios, validación y estilos CSS.</p>
            <div>
                <h3 class="text-heading mb-2 text-xl font-semibold">Ejercicios:</h3>
                <ul class="list-inside list-disc space-y-2 text-secondary">
                    <li>
                        <a class="nav-internal-link" href="/diseno/1/form">Formulario con validación y estilos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
require $VIEW_DIR . '/partials/__footer.php';
?>
