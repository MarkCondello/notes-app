<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
  $config = require basePath('config.php');
  return new Database($config['database']);
});

$db = $container->resolve('Core\Database');
// $foo = $container->resolve('Core\Database\SOMETHING');
// dd($foo);
// dd($db);

App::setContainer($container);