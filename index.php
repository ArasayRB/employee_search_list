<?php
namespace App;
require __DIR__ . '/vendor/autoload.php';

use Resources\Config\Common;
use GuzzleHttp\Client;
use App\Controllers\ApiController;
use Phroute\Phroute\{RouteCollector,RouteParser,Dispatcher};
use Phroute\Phroute\Exception\{HttpMethodNotAllowedException,HttpRouteNotFoundException};

define("ROOT_DIRECTORY", __DIR__);
define("API_DIRECTORY", ROOT_DIRECTORY . "/app");
define("RESOURCES_DIRECTORY", ROOT_DIRECTORY . "/resources");
define("LOGS_PATH", __DIR__ . DIRECTORY_SEPARATOR . "logs");
define("BASE_URL", Common::env("BASE_URL"));
define("PUBLIC_DIRECTORY_URL", BASE_URL . "/public");
define("API_PATH", BASE_URL . "/api");
define("API_NAME", "Employeers List");
define("AUTHOR", "Arasay Rodriguez Bastida | arbast");
ini_set('display_errors', 0);
ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/logs/" . date("Y-m-d") . ".log");
if (!file_exists(LOGS_PATH)) {
    mkdir(LOGS_PATH);
}


$enrutador = require_once "routes.php";

$despachador = new Dispatcher($enrutador->getData());
$rutaCompleta = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER['REQUEST_METHOD'];
$rutaLimpia = processInput($rutaCompleta);

try {
    echo $despachador->dispatch($metodo, $rutaLimpia); # Mandar sólo el método y la ruta limpia
} catch (HttpRouteNotFoundException $e) {
    echo "Error: Ruta no encontrada";
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Ruta encontrada pero método no permitido";
}


/**
 * Gracias a https://www.sitepoint.com/fast-php-routing-phroute/
 */
function processInput($uri)
{
    return implode('/',
        array_slice(
            explode('/', $uri), 2));
}
