<?php
$title = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Homepage</h1>
        <div class="text-secondary mt-4 text-2xl">
            <p>La fr fr homepage, en donde se verán todas las asignaturas y novedades etc</p>
        </div>
    </div>
    <div class="mx-20 mt-10 flex">
        <div
            class="bg-secondary border-border dark:bg-secondary-dark dark:border-border-dark max-w-lg rounded-lg border p-6 shadow-lg"
        >
            <h2 class="text-heading mb-4 text-2xl font-semibold">Información del estudiante:</h2>
            <ul class="text-secondary">
                <li>Nombre: Juan Rangel</li>
            </ul>
        </div>
    </div>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
