<?php
$title = 'Homepage Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

    <h1>Homepage Cliente</h1>
    <p> Esta es la pagina principal de la asignatura de cliente. </p>
    <p> Desde aquí se podrá navegar a todos los ejercicios de la asignatura. </p>
    <p> Los ejercicios de cliente son los siguientes: </p>

    <h2> Ejercicios </h2>
    <ul>
        <li><a href="/cliente/1/tarea"> Ejercicios de tarea </a></li>
        <li><a href="/cliente/1/ejercicios"> Primeros ejercicios </a></li>
        <li><a href="/cliente/1/navegadores"> Teórico sobre navegadores web </a></li>
        <li><a href="/cliente/1/interactivo"> Ejercicio interactivo </a></li>
        <li><a href="/cliente/1/loaded"> Ejercicios: Relacionados con windows onload y getElementById. </a></li>
    </ul>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>