<?php
namespace Core;

use Core\Response;
use Core\Middleware\Middleware;

class Router {
  protected $routes = [];

  public function get($uri, $controller)
  {
   return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
   return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
   return $this->add("DELETE", $uri, $controller);
  }

  public function patch($uri, $controller)
  {
   return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
   return $this->add('PUT', $uri, $controller);
  }

  protected function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
    ];
    return $this;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route){
      // echo "{$route['uri']} {$uri} {$route['method']} {$method}";
      // echo "<br>";
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        if ($route['middleware']) { // apply middleware if it exists
          Middleware::bind($route['middleware']);
          // $middleware = Middleware::MAP[$route['middleware']];
          // (new $middleware)->handle();
        }
        // $controller = require '../Http/controllers/' . $route['controller']; // this is throwing an error
       
       return require basePath('Http/controllers/' . $route['controller']); // this is throwing an error
      // return $controller;
       
        // Fatal error: Uncaught ValueError: Path cannot be empty in /Users/garyoconnell/Documents/_research/laracasts-notes-app/Http/controllers/sessions/create.php:7 Stack trace: #0 /Users/garyoconnell/Documents/_research/laracasts-notes-app/Core/Router.php(60): require() #1 /Users/garyoconnell/Documents/_research/laracasts-notes-app/public/index.php(28): Core\Router->route('/login', 'GET') #2 {main} thrown in /Users/garyoconnell/Documents/_research/laracasts-notes-app/Http/controllers/sessions/create.php on line 7
        // return $controller;
      }
    }
    $this->abort();
  }

  protected function abort($code = Response::NOT_FOUND)
  {
    HTTP_response_code($code);
    require basePath("views/{$code}.view.php"); // load view from the root dir
    die();
  }

  function only($key)
  {
    // why is it always the last index of the routes array?
    // we loop through all the routes to find a matching route and return that
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }
}
