<?php
$title = 'Homepage Cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

    <h1>Homepage Cliente</h1>
    <p> Esta es la pagina principal de la asignatura de cliente. </p>
    <p> Desde aqui se podra navegar a todos los ejercicios de la asignatura. </p>
    <p> Los ejercicios de cliente son los siguientes: </p>
    <h2> Ejercicios #1 </h2>
    <ul>
        <li><a href="/cliente/1/guess_number">Ejercicio 1: Adivinar el numero</a></li>
        <li><a href="/cliente/1/area_rectangulo">Ejercicio 2: Area de un rectangulo</a></li>
        <li><a href="/cliente/1/conversor_grados">Ejercicio 3: Conversor de grados</a></li>
    </ul>

    <h2> Ejercicios #3 </h2>
    <ul>
        <li><a href="/cliente/3/fecha"> Ejercicio 1: Fecha y hora actual </a></li>
        <li><a href="/cliente/3/textoColorido"> Ejercicio 2: Cambiar el color de un texto </a></li>
        <li><a href="/cliente/3/multiply"> Ejercicio 3: Multiplicar 2 números.</a></li>
        <li><a href="/cliente/3/imagen"> Ejercicio 4: Cambiar una imagen con un botón. </a></li>
    </ul>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>