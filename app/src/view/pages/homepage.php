<?php
$title = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

    <h1>Homepage</h1>
    <p>La fr fr homepage, en donde se verán todas las asignaturas m novedades etc </p>

    <h2> Información del estudiante:</h2>
    <ul>
        <li>Nombre: Juan Rangel</li>
    </ul>

<?php
echo "Servidor: " . $_SERVER["SERVER_SOFTWARE"] . "<br>";
echo "Raíz: " . $_SERVER["DOCUMENT_ROOT"] . "<br>";
?>


<?php
include $VIEW_DIR . '/layouts/__footer.php';

