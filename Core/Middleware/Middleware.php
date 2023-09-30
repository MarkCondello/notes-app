<?php
namespace Core\Middleware;

class Middleware
{
  const MAP = [
    'auth' => Auth::class,
    'guest' => Guest::class,
  ];

  public static function bind($middlewareName)
  {
    if (!$middlewareName) {
      return; // let the route through without any middleware
    }
    $middleware = self::MAP[$middlewareName] ?? false;
    if (!$middleware) {
      throw new \Exception("'{$middlewareName}' middleware does not exist.");
    }
    (new $middleware)->handle();
  }
}