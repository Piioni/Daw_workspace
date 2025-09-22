<?php

$GLOBALS['VIEW_DIR'] = __DIR__ . '/../src/view';

return [
    "view_dir" => __DIR__ . '/../src/view',

    'routes' => [
        // Public pages
        '/' => ['view' => '/homepage.php', 'directory' => '/pages'],
        '/homepage' => ['view' => '/homepage.php', 'directory' => '/pages'],

        // SERVIDOR
        '/servidor' => ['view' => '/home_servidor.php', 'directory' => '/pages/servidor'],
        // 1
        '/servidor/1/area-circulo' => ['view' => '/area_circulo.php', 'directory' => '/pages/servidor/1'],
        '/servidor/1/edad' => ['view' => '/edad.php', 'directory' => '/pages/servidor/1'],
        '/servidor/1/frutas' => ['view' => '/frutas.php', 'directory' => '/pages/servidor/1'],
        '/servidor/1/archivo' => ['view' => '/archivo.php', 'directory' => '/pages/servidor/1'],

        // CLIENTE
        '/cliente' => ['view' => '/home_cliente.php', 'directory' => '/pages/cliente'],
        // 1
        '/cliente/1/guess_number' => ['view' => '/guess_number.php', 'directory' => '/pages/cliente/1'],
        '/cliente/1/area_rectangulo' => ['view' => '/area_rectangulo.php', 'directory' => '/pages/cliente/1'],
        '/cliente/1/conversor_grados' => ['view' => '/conversor_grados.php', 'directory' => '/pages/cliente/1'],
        // 3
        '/cliente/3/fecha' => ['view' => '/fecha.php', 'directory' => '/pages/cliente/3'],
        '/cliente/3/textoColorido' => ['view' => '/textoColorido.php', 'directory' => '/pages/cliente/3'],
        '/cliente/3/multiply' => ['view' => '/multiply.php', 'directory' => '/pages/cliente/3'],
        '/cliente/3/imagen' => ['view' => '/imagen.php', 'directory' => '/pages/cliente/3'],

        // Error pages
        '/404' => ['view' => '/404.php', 'directory' => '/pages/errors'],
    ]
];
