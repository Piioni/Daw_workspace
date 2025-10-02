<?php
session_start();

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/router.php';

handleRequest();
