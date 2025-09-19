<?php
$titulo = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1>Homepage</h1>
<p>Hola, ¿qué tal?</p>
<p>Esta es la página principal de servidor, donde se podra navegar a todos los ejercicios de la asignatura.</p>
<p>Los ejercicios de servidor son los siguientes:</p>
<ul>
    <li><a href="/servidor/1/area-circulo">Ejercicio 1: Área de un círculo</a></li>
    <li><a href="/servidor/1/edad">Ejercicio 2: Edad</a></li>
    <li><a href="/servidor/1/frutas">Ejercicio 3: Frutas</a></li>
    <li><a href="/servidor/1/archivo">Ejercicio 4: Archivo</a></li>
</ul>

<?php include $VIEW_DIR . '/layouts/__footer.php'; ?>
