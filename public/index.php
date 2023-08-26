<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class){
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  // dd("{$class}.php");
  // require basePath("Core/{$class}.php");
  require basePath("{$class}.php");
});

$router = new \Core\Router();
$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_SERVER['POST']['_method'] ?? $_SERVER['REQUEST_METHOD']; // deletes are not getting read through POST superglobal
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

// $method = isset($_SERVER['POST']) ? 'posty' : 'something else';
  // dd(  $method );
$router->route($uri, $method);
