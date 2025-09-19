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
        '/servidor/1/area-circulo' => ['view' => '/1/area_circulo.php', 'directory' => 'pages/servidor'],
        '/servidor/1/edad' => ['view' => '/1/edad.php', 'directory' => 'pages/servidor'],
        '/servidor/1/frutas' => ['view' => '/1/frutas.php', 'directory' => 'pages/servidor'],
        '/servidor/1/archivo' => ['view' => '/1/archivo.php', 'directory' => 'pages/servidor'],

        // CLIENTE
        '/cliente' => ['view' => '/home_cliente.php', 'directory' => 'pages/cliente'],

        // Error pages
        '/404' => ['view' => '/404.php', 'directory' => 'errors'],
    ],

    'default_error_route' => '/404',
    'default_directory' => 'pages'
];
