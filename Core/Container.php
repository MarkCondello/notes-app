<?php
namespace Core;

class Container
{

  protected static $bindings = [];

  public static function bind($key, $resolver)
  {
    static::$bindings[$key] = $resolver;
  }

  public static function resolve($key)
  {
    if (! array_key_exists($key, static::$bindings)) {
      throw new \Exception("No {$key} is bound in the container.");
    }

    return call_user_func(static::$bindings[$key]);
  }
}