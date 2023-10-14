<?php
  // phpinfo();

session_start();

// var_dump($_SESSION['_flash'] ?? []);
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

// spl_autoload_register(function ($class){
  //   $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  //   // dd("{$class}.php");
  //   // require basePath("Core/{$class}.php");
  //   require basePath("{$class}.php");
  // });
require BASE_PATH . 'vendor/autoload.php';

$bootstrap = require basePath('bootstrap.php');

$router = new \Core\Router();
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// var_dump('INDEX: ');
// var_dump($uri);
// var_dump($method);

$router->route($uri, $method);

// dd('Reached the end of index.php');
// var_dump( $_SESSION); // SESSION is not available due to an error.
