<?php
$title = 'Ejercicios sueltos de cliente';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1>Nombre: Juan Rangel</h1>
<h1>DNI: Z0079225H</h1>
<h1>Fecha de creación: 26 septiembre 2025</h1>


<script>

    document.addEventListener("DOMContentLoaded", () => {
        let nombre = prompt("Cual es tu nombre?");
        alert(`Hola ${nombre}, bienvenido a la pagina!`);
    });

</script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>


