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
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

