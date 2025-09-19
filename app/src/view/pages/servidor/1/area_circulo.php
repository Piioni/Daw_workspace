<?php
$titulo = 'Homepage';
include __DIR__ . '/../../../layouts/__header.php';

function calcularAreaCirculo($radio): float|int
{
    return pi() * pow($radio, 2);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radio = $_POST['radio'];
    $area = calcularAreaCirculo($radio);
}

?>
<h1>Homepage</h1>

<form method="post">
    <label for="radio"> Radio para calcular area del circulo? </label>
    <input type="number" id="radio" placeholder="1-100" name="radio" min="1" max="100" required>
    <button type="submit">Calcular</button>
</form>

<?php if (isset($area)) : ?>
    <h2> El área del círculo es: <?php echo number_format($area, 2); ?> </h2>
<?php endif; ?>

<?php include __DIR__ . '/../../../layouts/__footer.php'; ?>

