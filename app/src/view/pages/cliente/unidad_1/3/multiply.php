<?php
$title = 'Multiplicar Números';
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';
?>

<h1>Multiplicar Números</h1>
<p>Este ejercicio permite al usuario ingresar dos números y muestra el resultado de su multiplicación.</p>

<label for="num1">Número 1:</label>
<input type="number" id="num1" name="num1" required>
<br><br>
<label for="num2">Número 2:</label>
<input type="number" id="num2" name="num2" required>
<br><br>
<input type="submit" value="Multiplicar" id="multiplyButton">

<p id="resultado"></p>

<script>
    const form = document.querySelector('form');
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
</script>

<?php
include $VIEW_DIR . '/layouts/__footer.php';
?>