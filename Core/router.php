<?php
namespace Core;

use Core\Response;

class Router {
  protected $routes = [];
  public function get($uri, $controller)
  {
    $this->add('GET', $uri, $controller);
  }
  public function post($uri, $controller)
  {
    $this->add('POST', $uri, $controller);
  }
  public function delete($uri, $controller)
  {
    $this->add('DELETE', $uri, $controller);
  }
  public function patch($uri, $controller)
  {
    $this->add('PATCH', $uri, $controller);
  }
  public function put($uri, $controller)
  {
    $this->add('PUT', $uri, $controller);
  }
  protected function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
    ];
  }
  public function route($uri, $method)
  {
    // dd($this->routes);
    // dd($method);
    foreach ($this->routes as $route){
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        // dd($route['uri']);
        // dd($route['method']);
        return require basePath($route['controller']); // this is throwing an error
      }
    }
    var_dump($uri, $method);
    $this->abort();
  }
  protected function abort($code = Response::NOT_FOUND)
  {
    HTTP_response_code($code);
    require basePath("views/{$code}.view.php"); // load view from the root dir
    die();
  }
}
