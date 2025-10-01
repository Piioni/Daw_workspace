<?php
$title = 'Conversor de grados';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<h1> Conversor de grados </h1>
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

<p id="result"></p>

<script>
    const conversionTypeSelect = document.querySelector('#conversionType');
    const celsiusForm = document.querySelector('#celsiusForm');
    const fahrenheitForm = document.querySelector('#fahrenheitForm');
    const result = document.querySelector('#result');


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
        const fahrenheit = (celsius * 9/5) + 32;
        result.textContent = `${celsius} grados Celsius son ${fahrenheit.toFixed(2)} grados Fahrenheit.`;
    });

    fahrenheitForm.addEventListener('submit', function(event) {
        event.preventDefault()
        const fahrenheit = parseFloat(document.querySelector('#fahrenheit').value);
        const celsius = (fahrenheit - 32) * 5/9;
        result.textContent = `${fahrenheit} grados Fahrenheit son ${celsius.toFixed(2)} grados Celsius.`;
    }



</script>
