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
        // Unidad 1
        '/servidor/1/tarea' => ['view' => '/to-do_list.php', 'directory' => '/pages/servidor/unidad_1/tarea'],
        '/servidor/1/php' => ['view' => '/php.php', 'directory' => '/pages/servidor/unidad_1/1'],
        '/servidor/1/errores' => ['view' => '/errores.php', 'directory' => '/pages/servidor/unidad_1/3'],

        // CLIENTE
        '/cliente' => ['view' => '/home_cliente.php', 'directory' => '/pages/cliente'],
        // 1
        '/cliente/1/guess_number' => ['view' => '/guess_number.php', 'directory' => '/pages/cliente/unidad_1/1'],
        '/cliente/1/area_rectangulo' => ['view' => '/area_rectangulo.php', 'directory' => '/pages/cliente/unidad_1/1'],
        '/cliente/1/conversor_grados' => ['view' => '/conversor_grados.php', 'directory' => '/pages/cliente/unidad_1/1'],
        // 2
        '/cliente/2/navegadores' => ['view' => '/navegadores.php', 'directory' => '/pages/cliente/unidad_1/2'],
        // 3
        '/cliente/3/fecha' => ['view' => '/fecha.php', 'directory' => '/pages/cliente/unidad_1/3'],
        '/cliente/3/textoColorido' => ['view' => '/textoColorido.php', 'directory' => '/pages/cliente/unidad_1/3'],
        '/cliente/3/multiply' => ['view' => '/multiply.php', 'directory' => '/pages/cliente/unidad_1/3'],
        '/cliente/3/imagen' => ['view' => '/imagen.php', 'directory' => '/pages/cliente/unidad_1/3'],
        // 4
        '/cliente/4/loaded' => ['view' => '/loaded.php', 'directory' => '/pages/cliente/unidad_1/4'],

        // Error pages
        '/404' => ['view' => '/404.php', 'directory' => '/pages/errors'],
    ]
];
