<?php

use Illuminate\Http\Request;

// ini_set('post_max_size','300M');
// ini_set('upload_max_filesize','300M');
// ini_set('memory_limit','200M');
// ini_set('max_execution_time','200');

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
