<?php
$title = 'Homepage';
include VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full">
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-2 text-center text-6xl font-semibold">
        <h1>Homepage</h1>
        <div class="mt-4 text-2xl text-secondary">
            <p>La fr fr homepage, en donde se verán todas las asignaturas y novedades etc</p>
        </div>
    </div>
    <div class="mx-20 mt-10 flex">
        <div
            class="max-w-lg rounded-lg border border-border bg-secondary p-6 shadow-lg dark:border-border-dark dark:bg-secondary-dark"
        >
            <h2 class="text-heading mb-4 text-2xl font-semibold">Información del estudiante:</h2>
            <ul class="text-secondary">
                <li>Nombre: Juan Rangel</li>
            </ul>
        </div>
    </div>
</div>

<?php
include VIEW_DIR . '/partials/__footer.php';
?>
