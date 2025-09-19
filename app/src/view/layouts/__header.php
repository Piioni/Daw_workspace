<?php
$titulo = $titulo ?? 'Tal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>  <?php echo htmlspecialchars($titulo) ?> </title>
</head>
<body>
<header>
    <nav>
        <a href="/">Home</a>
        <a href="/1">Ejercicio 1</a>
        <a href="/2">Ejercicio 2</a>
    </nav>
</header>
