<?php
$title = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="flex flex-col items-center justify-center text-heading text-6xl font-semibold text-center mt-10 py-2">
        <h1>Homepage</h1>
        <div class="text-secondary text-2xl mt-4">
            <p>La fr fr homepage, en donde se verán todas las asignaturas y novedades etc</p>
        </div>
    </div>
    <div class="flex mt-10 mx-20">
        <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg max-w-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-heading">Información del estudiante:</h2>
            <ul class="text-secondary">
                <li>Nombre: Juan Rangel</li>
            </ul>
        </div>
    </div>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
