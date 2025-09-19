<?php
$title = "frutas y precios";
require __DIR__ . '/../../layouts/__header.php';

$frutas = [
    'Manzana' => 1.5,
    'Banana' => 0.75,
    'Naranja' => 1.2,
    'Uva' => 2.0,
    'Mango' => 1.8
];

?>
    <h1>Lista de Frutas y sus Precios</h1>
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

<?php
require __DIR__ . '/../../layouts/__footer.php';
