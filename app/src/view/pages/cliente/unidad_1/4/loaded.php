<?php
$title = 'Cambiar texto de un párrafo';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

    <h2> 1. Cambiar el texto de un párrafo </h2>
    <p id="textToChange"> Este es el texto original. </p>
    <button id="changeTextButton"> Cambiar texto</button>
    <br>
    <br>

    <h2> 2. Cambiar el color de un elemento </h2>
    <div id="colorToChange">
        <br>
        <button id="changeColorButton"> Cambiar color?</button>
        <br>
        <br>
    </div>

    <h2> 3. Actualizar el valor de un input </h2>
    <label for="inputToChange"> Input a cambiar: </label>
    <input type="text" id="inputToChange" value="Valor original">
    <button id="changeInputButton"> Cambiar valor</button>
    <br>
    <br>

    <h2> 4. Mostrar alerta con contenido!</h2>
    <p id="alertText"> Este es el texto de la alerta (if you read this u are tupid). </p>
    <button id="showAlertButton"> Mostrar alerta!</button>
    <br>
    <br>

    <h2> 5. Ocultar un elemento </h2>
    <p id="textToHide"> NOOOO!, no me oculteeess. </p>
    <button id="hideTextButton"> Ocultar texto</button>
    <br>
    <br>

    <h2> 6. Saludar al terminar de cargar</h2>
    <p> a que ya lo viste eh</p>
    <br>

    <h2> 7. Mostrar fecha y hora </h2>
    <p id="dateTime"></p>
    <br>

    <h2> 8. Habilitar botón al cargarse la ventana </h2>
    <p> Seguramente siempre este habilitado, no es que se demore mucho en cargar la verdad</p>
    <button id="enabledButton" disabled> I dont do anything, lmao</button>

    <script>
        window.onload = () => {
            alert('Bienvenido a la pagina!');

            const dateTimeParagraph = document.querySelector('#dateTime');
            const currentDate = new Date();
            dateTimeParagraph.textContent = `Fecha y hora actual: ${currentDate.toLocaleString()}`;

            const enabledButton = document.querySelector('#enabledButton');
            enabledButton.disabled = false;
        }

        document.addEventListener('DOMContentLoaded', () => {

            const button = document.querySelector('#changeTextButton');
            const paragraph = document.querySelector('#textToChange');

            button.addEventListener('click', () => {
                paragraph.textContent = ' El texto ha sido cambiado. ';
            });

            const colorDiv = document.querySelector('#colorToChange');
            const colorButton = document.querySelector('#changeColorButton');

            colorButton.addEventListener('click', () => {
                colorDiv.style.backgroundColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
            });

            const inputToChange = document.querySelector('#inputToChange');
            const changeInputButton = document.querySelector('#changeInputButton');

            changeInputButton.addEventListener('click', () => {
                inputToChange.value = ' Lmao ';
            });

            const alertText = document.querySelector('#alertText').textContent;
            const showAlertButton = document.querySelector('#showAlertButton');

            showAlertButton.addEventListener('click', () => {
                alert(alertText);
            })

            const textToHide = document.querySelector('#textToHide');
            const hideTextButton = document.querySelector('#hideTextButton');

            hideTextButton.addEventListener('click', () => {
                textToHide.style.display = 'none';
            })
        });

    </script>

<?php
include $VIEW_DIR . '/partials/__footer.php';