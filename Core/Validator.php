<?php
namespace Core;

class Validator
{
   // pure functions can be static
   // pure meaning it is not dependant on other files, it takes values and returns a value
  public static function string($value, $min = 1, $max = INF)
  {
    $value = trim($value);
    return strlen($value) >= $min && strlen($value) <= $max;
  }
  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}