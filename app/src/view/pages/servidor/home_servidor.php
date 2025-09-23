<?php
$titulo = 'Homepage Servidor';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1>Homepage Servidor</h1>
<p>Hola, ¿qué tal?</p>
<p>Esta es la página principal de servidor, donde se podra navegar a todos los ejercicios de la asignatura.</p>
<p>Los ejercicios de servidor son los siguientes:</p>
<ul>
    <li><a href="/servidor/1/php">Primeros ejercicios</a></li>

</ul>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>
