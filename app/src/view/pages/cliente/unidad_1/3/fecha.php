<?php
$title = 'Homepage';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<h1>Fecha y hora actual</h1>
<p> Este ejercicio ha mostrado la fecha y hora actual. </p>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fechaHoraActual = new Date();
        const opciones = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        const fechaHoraFormateada = fechaHoraActual.toLocaleDateString('es-ES', opciones);
        document.body.insertAdjacentHTML('beforeend', `<p>Fecha y hora actual: ${fechaHoraFormateada}</p>`);
    })
</script>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
