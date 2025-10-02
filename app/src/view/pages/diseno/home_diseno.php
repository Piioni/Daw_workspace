<?php
$title = "Home - Diseño";
global $VIEW_DIR;
require $VIEW_DIR . '/partials/__header.php';
?>

<div class="mx-auto p-10 min-h-screen ">
    <div class="flex flex-col items-center justify-center py-2">
        <h1 class="text-primary text-4xl font-bold text-center">
            Página de inicio de la sección de Diseño
        </h1>
    </div>
    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4">Unidad 1</h2>
        <ul class="list-disc list-inside space-y-2">
            <li>
                <a href="/diseno/1/form" class="text-blue-600 hover:underline">
                    Formulario con validación y estilos
                </a>
            </li>
        </ul>
    </div>
</div>

<?php
require $VIEW_DIR . '/partials/__footer.php';
?>
