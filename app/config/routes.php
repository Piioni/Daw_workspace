<?php

require_once __DIR__ . '/../core/Router.php';

use Core\Router;

$router = new Router();

// Public pages
$router->get('/', 'homepage.php', '/pages');
$router->get('/homepage', 'homepage.php', '/pages');

// SERVIDOR
$router->get('/servidor', 'home_servidor.php', '/pages/servidor');
// Unidad 1
$router->get('/servidor/1/tarea', 'to-do_list.php', '/pages/servidor/unidad_1/tarea');
$router->get('/servidor/1/php', 'php.php', '/pages/servidor/unidad_1/1');
$router->get('/servidor/1/errores', 'errores.php', '/pages/servidor/unidad_1/3');
// Unidad 2
$router->get('/servidor/2/tarea', 'index.php', '/pages/servidor/unidad_2/tarea');
$router->get('/servidor/2/dinamic_web', 'dinamic_web.php', '/pages/servidor/unidad_2/1');
// Unidad 3
$router->get('/servidor/3/tarea', 'tarea.php', '/pages/servidor/unidad_3/tarea');
$router->get('/servidor/3/ejercicios', 'ejercicios.php', '/pages/servidor/unidad_3/1');
// Unidad 4
$router->get('/servidor/4/cookies', 'cookies.php', '/pages/servidor/unidad_4/1');
$router->get('/servidor/4/sessions', 'sessions.php', '/pages/servidor/unidad_4/2');
$router->get('/servidor/4/seguridad', 'seguridad.php', '/pages/servidor/unidad_4/4');

// CLIENTE
$router->get('/cliente', 'home_cliente.php', '/pages/cliente');
// Unidad 1
$router->get('/cliente/1/tarea', 'si.php', '/pages/cliente/unidad_1/tarea');
$router->get('/cliente/1/ejercicios', 'ejercicios.php', '/pages/cliente/unidad_1');
$router->get('/cliente/1/navegadores', 'navegadores.php', '/pages/cliente/unidad_1');
$router->get('/cliente/1/interactivo', 'interactivo.php', '/pages/cliente/unidad_1');
$router->get('/cliente/1/loaded', 'loaded.php', '/pages/cliente/unidad_1');
// Unidad 2
$router->get('/cliente/2/tarea', 'tarea.php', '/pages/cliente/unidad_2/tarea');
$router->get('/cliente/2/js1', 'js1.php', '/pages/cliente/unidad_2/1');
$router->get('/cliente/2/js2', 'js2.php', '/pages/cliente/unidad_2/2');
// Unidad 3
$router->get('/cliente/3/tarea', 'tarea3.php', '/pages/cliente/unidad_3/tarea');
$router->get('/cliente/3/tarea/reloj', 'reloj.php', '/pages/cliente/unidad_3/tarea');
$router->get('/cliente/3/objetos', 'objetos.php', '/pages/cliente/unidad_3/1');

// Anexos
$router->get('/anexos', 'anexos.php', '/pages/anexos');
$router->get('/anexos/jquery', 'ejercicios.php', '/pages/anexos/jquery');

// DISEÑO
$router->get('/diseno', 'home_diseno.php', '/pages/diseno');
$router->get('/diseno/1/form', 'form.php', '/pages/diseno/unidad_1');

// Error pages
$router->get('/404', '404.php', '/pages/errors');

return ['router' => $router];
