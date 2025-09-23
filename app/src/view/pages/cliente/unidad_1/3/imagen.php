<?php
$title = 'Cambiar imagen con un boton';
global $VIEW_DIR;
global $PUBLIC_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

    <h1 class="text-center">Cambiar imagen con un botón</h1>
    <div class="text-center">
        <img id="imagen" src="" alt="Imagen cambiante" class="img-fluid mb-3">
        <br>
    </div>

    <button id="cambiarImagenBtn" class="btn btn-primary">Cambiar Imagen</button>

    <script>
        const imagen1 = "/images/cat.jpg";
        const imagen2 = "/images/rammus.png";

        const imagen = document.getElementById('imagen');
        const cambiarImagenBtn = document.getElementById('cambiarImagenBtn');
        let imagenActual = 1;
        imagen.src = imagen1;
        cambiarImagenBtn.addEventListener('click', () => {
            if (imagenActual === 1) {
                imagen.src = imagen2;
                imagenActual = 2;
            } else {
                imagen.src = imagen1;
                imagenActual = 1;
            }
        });

    </script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>