<?php
global $VIEW_DIR;
include $VIEW_DIR . '/layouts/__header.php';

$title = "Lectura de archivos";
// Usa ruta absoluta basada en __DIR__
$archivoPath = __DIR__ . '/../../../../../public/random/datos.txt';
$archivo = fopen($archivoPath, 'r');
if ($archivo) {
    echo "<h1>Contenido del archivo datos.txt</h1>";
    echo "<pre>";
    while (($linea = fgets($archivo)) !== false) {
        echo htmlspecialchars($linea);
    }
    echo "</pre>";
    fclose($archivo);
} else {
    echo "<p>No se pudo abrir el archivo.</p>";
}
include $VIEW_DIR . '/layouts/__footer.php';
