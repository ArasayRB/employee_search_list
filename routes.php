<?php

require __DIR__ . '/vendor/autoload.php'; #Cargar todas las dependencias

use Phroute\Phroute\RouteCollector;

$collector = new RouteCollector();

$collector->get("/", ['App\Controllers\PersonController','index']);

return $collector;
