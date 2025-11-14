<?php
$titulo = 'Homepage';
include VIEW_DIR . '/partials/__header.php';

function calcularAreaCirculo($radio): float|int
{
    return pi() * pow($radio, 2);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si 'radio' está presente antes de usarla
    if (isset($_POST['radio']) && $_POST['radio'] !== '') {
        $radio = $_POST['radio'];
        $area = calcularAreaCirculo($radio);
    }

    // Verifica si 'edad' está presente antes de usarla
    if (isset($_POST['edad']) && $_POST['edad'] !== '') {
        $edad = (int) $_POST['edad'];
        if ($edad >= 18) {
            $mensaje = 'Eres mayor de edad.';
        } else {
            $mensaje = "Eres menor de edad. \n You cant drink lol";
        }
    }
}

$frutas = [
    'Manzana' => 1.5,
    'Banana' => 0.75,
    'Naranja' => 1.2,
    'Uva' => 2.0,
    'Mango' => 1.8,
];

?>

<h1>Ejercicios Variados de php</h1>

<h2>Calcular el area de un circulo!</h2>
<form method="post">
    <label for="radio">Radio para calcular area del circulo?</label>
    <input type="number" id="radio" placeholder="1-100" name="radio" min="1" max="100" required />
    <button type="submit">Calcular</button>
</form>

<?php if (isset($area)) : ?>

<h3>El área del círculo es: <?php echo number_format($area, 2); ?></h3>

<?php endif; ?>

<br />
<br />

<h2>Mostrar una lista de frutas junto a sus precios.</h2>
<h3>Lista de Frutas y sus Precios</h3>
<table>
    <tr>
        <th>Fruta</th>
        <th>Precio (USD)</th>
    </tr>

    <?php foreach ($frutas as $fruta => $precio) : ?>

    <tr>
        <td><?php echo htmlspecialchars($fruta); ?></td>
        <td><?php echo number_format($precio, 2); ?></td>
    </tr>

    <?php endforeach; ?>
</table>

<br />
<br />

<h2>¿Cuántos años tienes?</h2>
<form method="post">
    <label for="edad">Ingresa tu edad.</label>
    <input type="number" id="edad" placeholder="1-80" name="edad" min="1" max="80" required />
    <button type="submit">Enviar</button>
</form>

<?php if (isset($mensaje)) : ?>

<h3><?php echo htmlspecialchars($mensaje); ?></h3>

<?php endif; ?>

<br />
<br />

<?php
// Usa ruta absoluta para datos.txt
$archivoPath = __DIR__ . '/datos.txt';
$archivo = @fopen($archivoPath, 'r');
if ($archivo) {
    echo '<h2>Contenido del archivo datos.txt</h2>';
    echo '<pre>';
    while (($linea = fgets($archivo)) !== false) {
        echo htmlspecialchars($linea);
    }
    echo '</pre>';
    fclose($archivo);
} else {
    echo '<p>No se pudo abrir el archivo.</p>';
}
?>


<?php
include VIEW_DIR . '/partials/__footer.php';
?>