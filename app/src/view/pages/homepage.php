<?php
$title = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>
    <div class="w-full min-h-screen flex flex-col items-center">
        <div class="mt-10 text-6xl font-semibold mb-6" style="color: var(--color-text-heading);">
            <h1>Homepage</h1>
        </div>
        <div class="text-center mb-8" style="color: var(--color-text-secondary);">
            <p>La fr fr homepage, en donde se verán todas las asignaturas m novedades etc </p>
        </div>

        <div class="card p-6 rounded-lg border">
            <h2 class="text-xl font-semibold mb-4" style="color: var(--color-text-primary);">Información del estudiante:</h2>
            <ul style="color: var(--color-text-secondary);">
                <li>Nombre: Juan Rangel</li>
            </ul>
        </div>
    </div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
