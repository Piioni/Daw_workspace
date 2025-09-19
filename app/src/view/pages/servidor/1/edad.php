<?php
$title = 'Eres mayor de edad?';
require __DIR__ . '/../../layouts/__header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edad = (int) $_POST['edad'];
    if ($edad >= 18) {
        $mensaje = "Eres mayor de edad.";
    } else {
        $mensaje = "Eres menor de edad. \n You cant drink lol";
    }
}
?>

<h1>¿Cuántos años tienes?</h1>
<form method="post">
    <label for="edad"> Ingresa tu edad.</label>
    <input type="number" id="edad" placeholder="1-80" name="edad" min="1" max="80" required>
    <button type="submit">Enviar</button>
</form>

<?php if (isset($mensaje)) : ?>
    <h2> <?php echo htmlspecialchars($mensaje) ?></h2>
<?php endif; ?>

<?php require __DIR__ . '/../../layouts/__footer.php'; ?>

