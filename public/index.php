<?php
const BASE_PATH = __DIR__ . '/../'; // var_dump(BASE_PATH);
require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class){
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
  // dd("{$class}.php");
  // require basePath("Core/{$class}.php");
  require basePath("{$class}.php");
});

require basePath('Core/router.php');
