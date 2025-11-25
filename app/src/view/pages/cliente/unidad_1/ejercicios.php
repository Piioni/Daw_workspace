<?php
$title = 'Primeros ejercicios';
include VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="text-heading mt-10 flex flex-col py-2 text-4xl font-semibold">
        <div class="text-title text-center">
            <h1>Primeros Ejercicios de Cliente</h1>
        </div>
    </div>
    <main class="mx-8 mt-12 flex flex-col gap-2">
        <div
            class="space-y-10 rounded-lg border border-border bg-secondary p-6 px-10 shadow-lg dark:border-border-dark dark:bg-secondary-dark">
            <div>
                <p class="text-2xl">> Adivina mi número:</p>
                <p class="mt-3 text-lg text-secondary">
                    El objetivo del juego es adivinar un número al azar del 1 - 50, en el menor número de intentos
                    posibles.
                </p>

                <div class="mt-6 flex gap-4">
                    <button id="startGameBtn" class="btn-form">Empezar Juego</button>
                    <button id="resetGameBtn" disabled class="btn-form opacity-50">Reiniciar</button>
                </div>

                <div id="gameArea" style="display: none" class="mt-6">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="userGuess" class="form-label">Introduce un número entre 1 y 50:</label>
                            <input type="number" id="userGuess" min="1" max="50" class="form-input" />
                        </div>
                        <button id="submitGuessBtn" class="btn-form">Enviar</button>
                    </div>
                    <div class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <p id="feedback" class="text-lg font-medium"></p>
                        <p id="attempts" class="text-secondary"></p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Conversor de grados:</p>
                <p class="mt-3 text-lg text-secondary">Convierte grados Celsius a Fahrenheit y viceversa</p>

                <form id="conversionTypeForm" class="mt-6">
                    <div class="space-y-2">
                        <label for="conversionType" class="form-label">Selecciona el tipo de conversión:</label>
                        <select id="conversionType" name="conversionType" class="form-input">
                            <option value="tal">Selecciona una opción</option>
                            <option value="celsiusToFahrenheit">Celsius a Fahrenheit</option>
                            <option value="fahrenheitToCelsius">Fahrenheit a Celsius</option>
                        </select>
                    </div>
                </form>

                <form id="celsiusForm" style="display: none" class="mt-6">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="celsius" class="form-label">Celsius:</label>
                            <input type="number" id="celsius" name="celsius" class="form-input" />
                        </div>
                        <button type="submit" class="btn-form">Convertir</button>
                    </div>
                </form>

                <form id="fahrenheitForm" style="display: none" class="mt-6">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="fahrenheit" class="form-label">Fahrenheit:</label>
                            <input type="number" id="fahrenheit" name="fahrenheit" class="form-input" />
                        </div>
                        <button type="submit" class="btn-form">Convertir</button>
                    </div>
                </form>

                <div
                    class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700"
                    style="display: none"
                    id="container_grados">
                    <p id="result_grados" class="text-lg font-medium"></p>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Calcular el área de un rectángulo:</p>

                <form id="rectangleForm" class="mt-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="space-y-2">
                            <label for="altura" class="form-label">Longitud:</label>
                            <input type="number" id="altura" name="length" required class="form-input" />
                        </div>
                        <div class="space-y-2">
                            <label for="anchura" class="form-label">Anchura:</label>
                            <input type="number" id="anchura" name="width" required class="form-input" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="btn-form">Calcular Área</button>
                    </div>
                </form>

                <div class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-700" style="display: none" id="container_area">
                    <p id="result_area" class="text-lg font-medium"></p>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Rectangle area calculation
        const rectangleForm = document.querySelector('#rectangleForm');
        const container_area = document.querySelector('#container_area');
        rectangleForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const altura = parseFloat(document.querySelector('#altura').value);
            const anchura = parseFloat(document.querySelector('#anchura').value);
            const area = altura * anchura;
            document.querySelector('#result_area').textContent = `El área del rectángulo es: ${area}`;
            container_area.style.display = 'block';
        });

        // Game logic
        let randomNumber;
        let attempts;
        const startGameBtn = document.querySelector('#startGameBtn');
        const resetGameBtn = document.querySelector('#resetGameBtn');
        const userGuess = document.querySelector('#userGuess');
        const submitGuessBtn = document.querySelector('#submitGuessBtn');
        const feedback = document.querySelector('#feedback');
        const attemptsDisplay = document.querySelector('#attempts');

        startGameBtn.addEventListener('click', startGame);
        resetGameBtn.addEventListener('click', resetGame);
        submitGuessBtn.addEventListener('click', submitGuess);

        function startGame() {
            randomNumber = Math.floor(Math.random() * 50) + 1;
            attempts = 0;
            feedback.textContent = 'Good Luck!';
            attemptsDisplay.textContent = '';
            userGuess.value = '';
            document.querySelector('#gameArea').style.display = 'block';
            startGameBtn.disabled = true;
            startGameBtn.classList.add('opacity-50');
            resetGameBtn.disabled = false;
            resetGameBtn.classList.remove('opacity-50');
        }

        function resetGame() {
            randomNumber = null;
            attempts = 0;
            feedback.textContent = 'Too bad!, good luck next time';
            attemptsDisplay.textContent = '';
            userGuess.value = '';
            document.querySelector('#gameArea').style.display = 'none';
            startGameBtn.disabled = false;
            startGameBtn.classList.remove('opacity-50');
            resetGameBtn.disabled = true;
            resetGameBtn.classList.add('opacity-50');
        }

        function submitGuess() {
            const guess = Number(userGuess.value);
            if (!guess || guess < 1 || guess > 50) {
                feedback.textContent = 'Please enter a valid number between 1 and 50.';
                return;
            }

            attempts++;
            if (guess === randomNumber) {
                if (attempts === 1) {
                    feedback.textContent = `Increíble, lo has acertado a la primera!!! lmao`;
                } else {
                    feedback.textContent = 'Has acertado!!!';
                }
                attemptsDisplay.textContent = `Número de intentos: ${attempts}`;
                startGameBtn.disabled = false;
                startGameBtn.classList.remove('opacity-50');
                resetGameBtn.disabled = true;
                resetGameBtn.classList.add('opacity-50');
            } else if (guess < randomNumber) {
                feedback.textContent = 'El número es mayor';
                attemptsDisplay.textContent = `Número de intentos: ${attempts}`;
            } else {
                feedback.textContent = 'El número es menor';
                attemptsDisplay.textContent = `Número de intentos: ${attempts}`;
            }
        }

        // Temperature conversion
        const conversionTypeSelect = document.querySelector('#conversionType');
        const celsiusForm = document.querySelector('#celsiusForm');
        const fahrenheitForm = document.querySelector('#fahrenheitForm');
        const container_grados = document.querySelector('#container_grados');
        const result_grados = document.querySelector('#result_grados');

        conversionTypeSelect.addEventListener('change', function() {
            updateFormDisplay();
            result_grados.textContent = '';
            container_grados.style.display = 'none';
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

        celsiusForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const celsius = parseFloat(document.querySelector('#celsius').value);
            const fahrenheit = (celsius * 9) / 5 + 32;
            result_grados.textContent = `${celsius} grados Celsius son ${fahrenheit.toFixed(2)} grados Fahrenheit.`;
            container_grados.style.display = 'block';
        });

        fahrenheitForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const fahrenheit = parseFloat(document.querySelector('#fahrenheit').value);
            const celsius = ((fahrenheit - 32) * 5) / 9;
            result_grados.textContent = `${fahrenheit} grados Fahrenheit son ${celsius.toFixed(2)} grados Celsius.`;
            container_grados.style.display = 'block';
        });
    });
</script>

<?php
include VIEW_DIR . '/partials/__footer.php';
?>
