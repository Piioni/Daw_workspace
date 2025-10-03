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
    // Unidad 1
    '/cliente/1/tarea' => ['view' => '/si.php', 'directory' => '/pages/cliente/unidad_1/tarea'],
    '/cliente/1/ejercicios' => ['view' => '/ejercicios.php', 'directory' => '/pages/cliente/unidad_1/1'],
    '/cliente/1/navegadores' => ['view' => '/navegadores.php', 'directory' => '/pages/cliente/unidad_1/2'],
    '/cliente/1/interactivo' => ['view' => '/interactivo.php', 'directory' => '/pages/cliente/unidad_1/3'],
    '/cliente/1/loaded' => ['view' => '/loaded.php', 'directory' => '/pages/cliente/unidad_1/4'],
    // Unidad 2
    '/cliente/2/js' => ['view' => '/js.php', 'directory' => '/pages/cliente/unidad_2/1'],


    // DISEÑO
    '/diseno' => ['view' => '/home_diseno.php', 'directory' => '/pages/diseno'],
    // Unidad 1
    '/diseno/1/form' => ['view' => '/form.php', 'directory' => '/pages/diseno/unidad_1'],

    // Error pages
    '/404' => ['view' => '/404.php', 'directory' => '/pages/errors'],
  ]
];
