<?php
$title = "Homepage Diseño";
global $VIEW_DIR;
require $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="flex flex-col items-center justify-center text-heading text-6xl font-semibold text-center mt-10 py-2">
        <h1>Desarrollo Web - Diseño</h1>
        <div class="text-secondary text-2xl mt-4">
            <p>Página de inicio de la sección de Diseño</p>
        </div>
    </div>
    <div class="flex mt-10 mx-20">
        <div class="unit-card max-w-lg">
            <h2 class="text-2xl font-semibold mb-4 text-heading">Unidad 1</h2>
            <p class="mb-4 text-secondary">Ejercicios sobre formularios, validación y estilos CSS.</p>
            <div>
                <h3 class="text-xl font-semibold mb-2 text-heading">Ejercicios:</h3>
                <ul class="list-disc list-inside text-secondary space-y-2">
                    <li>
                        <a class="nav-internal-link" href="/diseno/1/form">
                            Formulario con validación y estilos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
require $VIEW_DIR . '/partials/__footer.php';
?>
