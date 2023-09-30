<?php
namespace Core;

use Core\Response;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
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
   return $this->add('DELETE', $uri, $controller);
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
        // apply middleware
        if ($route['middleware']) {
          Middleware::bind($route['middleware']);
          // $middleware = Middleware::MAP[$route['middleware']];
          // (new $middleware)->handle();
        }
        // if ($route['middleware'] === 'guest') {
        //   (new Guest)->handle();
        // }
        // if ($route['middleware'] === 'auth') {
        //   (new Auth)->handle();
        // }
        return require basePath($route['controller']); // this is throwing an error
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
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
    // dd($this);
  }
}
