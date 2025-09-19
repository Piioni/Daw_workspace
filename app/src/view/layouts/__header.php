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
        <a href="/servidor"> Servidor </a>
        <a href="/cliente"> Cliente </a>
    </nav>
</header>
