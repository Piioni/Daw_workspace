<?php

return [
    "view_dir" => __DIR__ . '/../src/view',

    'view_path' => [
        'pages' => 'pages',
    ],

    'routes' => [
        // Public pages
        '/' => ['view' => '/homepage.php', 'directory' => 'pages'],
        '/homepage' => ['view' => '/homepage.php', 'directory' => 'pages'],

        // SERVIDOR
        '/servidor' => ['view' => '/home_servidor.php', 'directory' => 'pages/servidor'],
        // 1
        '/servidor/1/area-circulo' => ['view' => '/1/area_circulo.php', 'directory' => 'pages/servidor'],
        '/servidor/1/edad' => ['view' => '/1/edad.php', 'directory' => 'pages/servidor'],
        '/servidor/1/frutas' => ['view' => '/1/frutas.php', 'directory' => 'pages/servidor'],
        '/servidor/1/archivo' => ['view' => '/1/archivo.php', 'directory' => 'pages/servidor'],

        // CLIENTE
        '/cliente' => ['view' => '/home_cliente.php', 'directory' => 'pages/cliente'],
        // 1
        '/cliente/1/guess_number' => ['view' => '/1/guess_number.php', 'directory' => 'pages/cliente'],
        '/cliente/1/area_rectangulo' => ['view' => '/1/area_rectangulo.php', 'directory' => 'pages/cliente'],
        '/cliente/1/conversor_grados' => ['view' => '/1/conversor_grados.php', 'directory' => 'pages/cliente'],
        // 3
        '/cliente/3/fecha' => ['view' => '/3/fecha.php', 'directory' => 'pages/cliente'],

        // Error pages
        '/404' => ['view' => '/404.php', 'directory' => 'errors'],
    ],

    'default_error_route' => '/404',
    'default_directory' => 'pages'
];
