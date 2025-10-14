<?php
$title = 'Interactivo';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="text-heading mt-10 flex flex-col py-2 text-4xl font-semibold">
        <div class="text-primary text-center">
            <h1>¡Ejercicios Interactivos!</h1>
        </div>
    </div>
    <main class="mx-8 mt-12 flex flex-col gap-2">
        <div
            class="bg-secondary border-border dark:bg-secondary-dark dark:border-border-dark space-y-10 rounded-lg border p-6 px-10 shadow-lg"
        >
            <div>
                <p class="text-2xl">> Fecha y hora actual:</p>
                <p class="text-secondary mt-3 text-lg">Este ejercicio muestra la fecha y hora actual.</p>
                <div class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                    <p id="fecha_hora" class="text-lg font-medium"></p>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Cambiar imagen con un botón:</p>
                <div class="mt-6 text-center">
                    <img id="imagen" src="" alt="Imagen cambiante" class="mx-auto mb-4 max-w-xs rounded-lg shadow-md" />
                    <br />
                    <button id="cambiarImagenBtn" class="btn-form">Cambiar Imagen</button>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Multiplicar Números:</p>
                <p class="text-secondary mt-3 text-lg">
                    Este ejercicio permite al usuario ingresar dos números y muestra el resultado de su multiplicación.
                </p>

                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="num1" class="form-label">Número 1:</label>
                        <input type="number" id="num1" name="num1" required class="form-input" />
                    </div>
                    <div class="space-y-2">
                        <label for="num2" class="form-label">Número 2:</label>
                        <input type="number" id="num2" name="num2" required class="form-input" />
                    </div>
                </div>
                <div class="mt-4 flex justify-center">
                    <button id="multiplyButton" class="btn-form">Multiplicar</button>
                </div>

                <div
                    class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700"
                    style="display: none"
                    id="container_resultado"
                >
                    <p id="resultado" class="text-lg font-medium"></p>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Cambiar el color de un texto:</p>
                <p class="text-secondary mt-3 text-lg">
                    En este ejercicio se cambiará el color de un párrafo presionando un botón. El color se seleccionará
                    de forma aleatoria de una lista de colores predefinidos.
                </p>

                <div class="mt-6 rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                    <p id="texto" class="mb-4 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut massa sed diam viverra imperdiet
                        sit amet vitae magna. Pellentesque porta laoreet accumsan. Suspendisse luctus justo urna.
                        Maecenas egestas leo eu commodo tincidunt. Integer velit augue, sagittis eu massa quis,
                        fringilla venenatis purus. Praesent nec feugiat purus, bibendum consectetur libero. Aenean
                        maximus lobortis libero. Aenean risus augue, tempor in convallis eget, lacinia condimentum
                        ipsum.
                    </p>
                    <button id="cambiarColorBtn" class="btn-form">Cambiar color</button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fecha y hora
        const fechaHoraActual = new Date();
        const opciones = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
        };
        const fechaHoraFormateada = fechaHoraActual.toLocaleDateString('es-ES', opciones);
        const fechaHoraElemento = document.querySelector('#fecha_hora');
        fechaHoraElemento.textContent = `Fecha y hora actual: ${fechaHoraFormateada}`;

        // Cambiar imagen
        const imagen1 = '/assets/images/cat.jpg';
        const imagen2 = '/assets/images/rammus.png';
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

        // Multiplicar números
        const button = document.querySelector('#multiplyButton');
        const container_resultado = document.querySelector('#container_resultado');
        button.addEventListener('click', () => {
            const num1 = parseFloat(document.getElementById('num1').value);
            const num2 = parseFloat(document.getElementById('num2').value);
            if (isNaN(num1) || isNaN(num2)) {
                alert('Por favor, ingrese números válidos.');
                return;
            }
            const resultado = num1 * num2;
            document.querySelector('#resultado').textContent = `El resultado de ${num1} x ${num2} es ${resultado}.`;
            container_resultado.style.display = 'block';
        });

        // Cambiar color del texto
        const colores = ['red', 'blue', 'green', 'orange', 'purple', 'pink', 'brown', 'yellow', 'cyan', 'magenta'];
        const texto = document.getElementById('texto');
        const cambiarColorBtn = document.getElementById('cambiarColorBtn');

        cambiarColorBtn.addEventListener('click', () => {
            texto.style.color = colores[Math.floor(Math.random() * colores.length)];
        });
    });
</script>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
