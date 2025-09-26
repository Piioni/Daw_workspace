<?php
$title = 'Interactivo';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1> ¡Ejercicios interactivos!</h1>

<h2>Fecha y hora actual</h2>
<p> Este ejercicio ha mostrado la fecha y hora actual. </p>
<p id="fecha_hora"></p>
<br><br>

<h2 class="text-center">Cambiar imagen con un botón</h2>
<div class="text-center">
    <img id="imagen" src="" alt="Imagen cambiante" class="img-fluid mb-3" style="max-width: 300px;">
    <br>
</div>

<button id="cambiarImagenBtn" class="btn btn-primary">Cambiar Imagen</button>
<br><br>

<h2>Multiplicar Números</h2>
<p>Este ejercicio permite al usuario ingresar dos números y muestra el resultado de su multiplicación.</p>

<label for="num1">Número 1:</label>
<input type="number" id="num1" name="num1" required>
<br><br>
<label for="num2">Número 2:</label>
<input type="number" id="num2" name="num2" required>
<br><br>
<input type="submit" value="Multiplicar" id="multiplyButton">

<p id="resultado"></p>

<h2>Cambiar el color de un texto</h2>
<p> En este ejercicio se cambiará el color de un párrafo presionando un botón.</p>
<p> El color se seleccionará de forma aleatoria de una lista de colores predefinidos.</p>

<p id="texto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut massa sed diam viverra imperdiet sit amet vitae magna. Pellentesque porta laoreet accumsan. Suspendisse luctus justo urna. Maecenas egestas leo eu commodo tincidunt. Integer velit augue, sagittis eu massa quis, fringilla venenatis purus. Praesent nec feugiat purus, bibendum consectetur libero. Aenean maximus lobortis libero. Aenean risus augue, tempor in convallis eget, lacinia condimentum ipsum. . </p>
<button id="cambiarColorBtn"> Cambiar color </button>


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
        const fechaHoraElemento = document.querySelector('#fecha_hora');
        fechaHoraElemento.textContent = `Fecha y hora actual: ${fechaHoraFormateada }`;

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

        const button = document.querySelector('#multiplyButton');
        button.addEventListener('click', () => {
            const num1 = parseFloat(document.getElementById('num1').value);
            const num2 = parseFloat(document.getElementById('num2').value);
            if (isNaN(num1) || isNaN(num2)) {
                alert('Por favor, ingrese números válidos.');
                return;
            }
            const resultado = num1 * num2;
            document.querySelector('#resultado').textContent = `El resultado de ${num1} x ${num2} es ${resultado}.`;

        });

        const colores = ['red', 'blue', 'green', 'orange', 'purple', 'pink', 'brown', 'yellow', 'cyan', 'magenta'];
        const texto = document.getElementById('texto');
        const cambiarColorBtn = document.getElementById('cambiarColorBtn');

        cambiarColorBtn.addEventListener('click', () => {
            texto.style.color = colores[Math.floor(Math.random() * colores.length)];
        })
    })
</script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>
