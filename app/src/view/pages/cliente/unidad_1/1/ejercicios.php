<?php
$title = 'Primeros ejercicios';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1> Primeros ejercicios de cliente </h1>

<h2> Adivina mi numero!!!</h2>
<p> El objetivo del juego es adivinar un número al azar del 1 - 50, en el menor número de intentos posibles.</p>
<p> El juego comienza cuando se pulsa el botón "Empezar Juego".</p>
<p> El juego termina cuando se acierta el número.</p>
<p> El juego se puede reiniciar en cualquier momento pulsando el botón "Reiniciar" </p>


<button id="startGameBtn">Empezar Juego</button>
<button id="resetGameBtn" disabled>Reiniciar</button>

<div id="gameArea" style="display:none;">
    <label for="userGuess"> Introduce un número entre 1 y 50:</label>
    <input type="number" id="userGuess" min="1" max="50">
    <button id="submitGuessBtn">Enviar</button>
    <p id="feedback"></p>
    <p id="attempts"></p>
</div>
<br><br>

<h2> Conversor de grados </h2>
<p> Convierte grados Celsius a Fahrenheit y viceversa </p>

<form id="conversionTypeForm">
    <label for="conversionType"> Selecciona el tipo de conversión: </label>
    <select id="conversionType" name="conversionType">
        <option value="tal"> Selecciona una opcion</option>
        <option value="celsiusToFahrenheit"> Celsius a Fahrenheit</option>
        <option value="fahrenheitToCelsius"> Fahrenheit a Celsius</option>
    </select>
</form>

<form id="celsiusForm" style="display: none;">
    <label for="celsius"> Celsius </label>
    <input type="number" id="celsius" name="celsius">
    <br>
    <button type="submit"> Convertir</button>
</form>

<form id="fahrenheitForm" style="display: none;">
    <label for="fahrenheit"> Fahrenheit </label>
    <input type="number" id="fahrenheit" name="fahrenheit">
    <br>
    <button type="submit"> Convertir</button>
</form>

<p id="result_grados"></p>
<br><br>

<h2> ¿Quieres calcular el área de un rectangulo huh? </h2>
<form id="rectangleForm">
    <label for="altura">Longitud:</label>
    <input type="number" id="altura" name="length" required>
    <br>
    <label for="anchura">Anchura:</label>
    <input type="number" id="anchura" name="width" required>
    <br>
    <button type="submit">Calcular Area</button>
</form>
<p id="result_area"></p>
<br><br>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelector('#rectangleForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const altura = parseFloat(document.querySelector('#altura').value);
            const anchura = parseFloat(document.querySelector('#anchura').value);
            const area = altura * anchura;

            document.querySelector('#result_area').textContent = `El area del rectangulo es: ${area}`;
        });

        let randomNumber
        let attempts
        const startGameBtn = document.querySelector('#startGameBtn')
        const resetGameBtn = document.querySelector('#resetGameBtn')

        const userGuess = document.querySelector('#userGuess')
        const submitGuessBtn = document.querySelector('#submitGuessBtn')
        const feedback = document.querySelector('#feedback')
        const attemptsDisplay = document.querySelector('#attempts')

        startGameBtn.addEventListener('click', startGame)
        resetGameBtn.addEventListener('click', resetGame)
        submitGuessBtn.addEventListener('click', submitGuess)

        function startGame() {
            randomNumber = Math.floor(Math.random() * 50) + 1
            attempts = 0
            feedback.textContent = 'Good Luck!'
            attemptsDisplay.textContent = ''
            userGuess.value = ''
            document.querySelector('#gameArea').style.display = 'block'
            startGameBtn.disabled = true
            resetGameBtn.disabled = false
        }

        function resetGame() {
            randomNumber = null
            attempts = 0
            feedback.textContent = 'Too bad!, good luck next time'
            attemptsDisplay.textContent = ''
            userGuess.value = ''
            startGameBtn.disabled = false
            resetGameBtn.disabled = true
        }

        function submitGuess() {
            const guess = Number(userGuess.value)
            if (!guess || guess < 1 || guess > 50) {
                feedback.textContent = 'Please enter a valid number between 1 and 50.'
                return
            }

            attempts++
            if (guess === randomNumber) {
                if (attempts === 1) {
                    feedback.textContent = `Increible, lo has acertado a la primera!!! lmao`
                }
                feedback.textContent = 'Has acertado!!!'
                attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
                startGameBtn.disabled = false
                resetGameBtn.disabled = true
            } else if (guess < randomNumber) {
                feedback.textContent = 'El numero es mayor'
                attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
            } else {
                feedback.textContent = 'El numero es menor'
                attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
            }
        }

        const conversionTypeSelect = document.querySelector('#conversionType');
        const celsiusForm = document.querySelector('#celsiusForm');
        const fahrenheitForm = document.querySelector('#fahrenheitForm');
        const result = document.querySelector('#result_grados');


        conversionTypeSelect.addEventListener('change', function () {
            updateFormDisplay();
            result.textContent = '';
        });

        function updateFormDisplay() {
            const selectedValue = conversionTypeSelect.value;
            if (selectedValue === 'tal') {
                celsiusForm.style.display = 'none';
                fahrenheitForm.style.display = 'none';
                return;
            }
            if (conversionTypeSelect.value === 'celsiusToFahrenheit') {
                celsiusForm.style.display = 'block';
                fahrenheitForm.style.display = 'none';
            } else {
                celsiusForm.style.display = 'none';
                fahrenheitForm.style.display = 'block';
            }
        }

        celsiusForm.addEventListener('submit', function (event) {
            event.preventDefault()
            const celsius = parseFloat(document.querySelector('#celsius').value);
            const fahrenheit = (celsius * 9 / 5) + 32;
            result.textContent = `${celsius} grados Celsius son ${fahrenheit.toFixed(2)} grados Fahrenheit.`;
        });

        fahrenheitForm.addEventListener('submit', function (event) {
            event.preventDefault()
            const fahrenheit = parseFloat(document.querySelector('#fahrenheit').value);
            const celsius = (fahrenheit - 32) * 5 / 9;
            result.textContent = `${fahrenheit} grados Fahrenheit son ${celsius.toFixed(2)} grados Celsius.`;
        });


    });


</script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>

