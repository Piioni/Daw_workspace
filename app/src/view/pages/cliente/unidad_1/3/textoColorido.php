<?php
$title = 'Cambiar el color de un texto';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1>Cambiar el color de un texto</h1>
<p> En este ejercicio se cambiara el color de un parrafo presionando un boton.</p>
<p> El color se seleccionara de forma aleatoria de una lista de colores predefinidos.</p>

<p id="texto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut massa sed diam viverra imperdiet sit amet vitae magna. Pellentesque porta laoreet accumsan. Suspendisse luctus justo urna. Maecenas egestas leo eu commodo tincidunt. Integer velit augue, sagittis eu massa quis, fringilla venenatis purus. Praesent nec feugiat purus, bibendum consectetur libero. Aenean maximus lobortis libero. Aenean risus augue, tempor in convallis eget, lacinia condimentum ipsum. . </p>
<button id="cambiarColorBtn"> Cambiar color </button>

<script>
    const colores = ['red', 'blue', 'green', 'orange', 'purple', 'pink', 'brown', 'yellow', 'cyan', 'magenta'];
    const texto = document.getElementById('texto');
    const cambiarColorBtn = document.getElementById('cambiarColorBtn');

    cambiarColorBtn.addEventListener('click', () => {
        texto.style.color = colores[Math.floor(Math.random() * colores.length)];
    })
</script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>