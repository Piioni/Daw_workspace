<?php

/**
 * Archivo central para cargar todos los middlewares
 * Incluye este archivo en el punto de entrada (index.php)
 */

require_once __DIR__ . '/Middleware.php';
require_once __DIR__ . '/Authenticated.php';
require_once __DIR__ . '/Guest.php';
require_once __DIR__ . '/Admin.php';
require_once __DIR__ . '/Role.php';

