<?php
$title = 'Ejercicios Windows onLoad';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full mb-15">
    <div class="flex flex-col text-heading text-4xl font-semibold mt-10 py-2">
        <div class="text-center text-primary">
            <h1>Ejercicios: Windows onLoad</h1>
        </div>
    </div>
    <main class="flex flex-col mt-12 mx-8 gap-2">
        <div class="bg-secondary border-border dark:bg-secondary-dark border dark:border-border-dark rounded-lg shadow-lg p-6 px-10 space-y-10">

            <div>
                <p class="text-2xl"> > Cambiar el texto de un párrafo:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p id="textToChange" class="text-lg mb-4">Este es el texto original.</p>
                    <button id="changeTextButton" class="btn-form">Cambiar texto</button>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Cambiar el color de un elemento:</p>
                <div id="colorToChange" class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p class="text-lg mb-4">Haz clic en el botón para cambiar el color de fondo de este contenedor.</p>
                    <button id="changeColorButton" class="btn-form">Cambiar color</button>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Actualizar el valor de un input:</p>
                <div class="mt-6 space-y-4">
                    <div class="space-y-2">
                        <label for="inputToChange" class="form-label">Input a cambiar:</label>
                        <input type="text" id="inputToChange" value="Valor original" class="form-input">
                    </div>
                    <button id="changeInputButton" class="btn-form">Cambiar valor</button>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Mostrar alerta con contenido:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p id="alertText" class="text-lg mb-4">Este es el texto de la alerta (if you read this u are
                        tupid).</p>
                    <button id="showAlertButton" class="btn-form">Mostrar alerta</button>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Ocultar un elemento:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p id="textToHide" class="text-lg mb-4">NOOOO!, no me oculteeess.</p>
                    <button id="hideTextButton" class="btn-form">Ocultar texto</button>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Saludar al terminar de cargar:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p class="text-lg">A que ya lo viste eh</p>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Mostrar fecha y hora:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p id="dateTime" class="text-lg font-medium"></p>
                </div>
            </div>

            <div>
                <p class="text-2xl"> > Habilitar botón al cargarse la ventana:</p>
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                    <p class="text-lg mb-4">Seguramente siempre esté habilitado, no es que se demore mucho en cargar la
                        verdad</p>
                    <button id="enabledButton" disabled class="btn-form opacity-50">I dont do anything, lmao</button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    window.onload = () => {
        alert('Bienvenido a la página!');

        const dateTimeParagraph = document.querySelector('#dateTime');
        const currentDate = new Date();
        dateTimeParagraph.textContent = `Fecha y hora actual: ${currentDate.toLocaleString()}`;

        const enabledButton = document.querySelector('#enabledButton');
        enabledButton.disabled = false;
        enabledButton.classList.remove('opacity-50');
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Cambiar texto
        const button = document.querySelector('#changeTextButton');
        const paragraph = document.querySelector('#textToChange');
        button.addEventListener('click', () => {
            paragraph.textContent = 'El texto ha sido cambiado.';
        });

        // Cambiar color
        const colorDiv = document.querySelector('#colorToChange');
        const colorButton = document.querySelector('#changeColorButton');
        colorButton.addEventListener('click', () => {
            colorDiv.style.backgroundColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        });

        // Cambiar input
        const inputToChange = document.querySelector('#inputToChange');
        const changeInputButton = document.querySelector('#changeInputButton');
        changeInputButton.addEventListener('click', () => {
            inputToChange.value = 'Lmao';
        });

        // Mostrar alerta
        const alertText = document.querySelector('#alertText').textContent;
        const showAlertButton = document.querySelector('#showAlertButton');
        showAlertButton.addEventListener('click', () => {
            alert(alertText);
        });

        // Ocultar texto
        const textToHide = document.querySelector('#textToHide');
        const hideTextButton = document.querySelector('#hideTextButton');
        hideTextButton.addEventListener('click', () => {
            textToHide.style.display = 'none';
        });
    });
</script>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
