<?php
$title = 'Rectangle area';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>
<h1> Quieres calcular el area de un rectangulo huh?, nada yo te ayudo </h1>

<form id="rectangleForm">
    <label for="altura">Longitud:</label>
    <input type="number" id="altura" name="length" required>
    <br>
    <label for="anchura">Anchura:</label>
    <input type="number" id="anchura" name="width" required>
    <br>
    <button type="submit">Calcular Area</button>
</form>

<p id="result"></p>

<script>
    document.querySelector('#rectangleForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const altura = parseFloat(document.querySelector('#altura').value);
        const anchura = parseFloat(document.querySelector('#anchura').value);
        const area = altura * anchura;

        document.querySelector('#result').textContent = `El area del rectangulo es: ${area}`;
    });
</script>

