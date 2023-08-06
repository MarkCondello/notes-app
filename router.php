<?php
// DevNote: parse_url will break the uri into parts ie 'path' and 'query'.
// DevNote: To make this router work, we needed to force all traffic to go through this index.php file with a .htaccess redirect rule.
// var_dump($uri);
//  die();
// if ($uri === '/') {
  //   require 'controllers/index.php';
  // }
  // if ($uri === '/about') {
    //   require 'controllers/about.php';
    // }
    // if ($uri === '/contact') {
      //   require 'controllers/contact.php';
      // }
function abort($code = 404){
  HTTP_response_code($code);
  require "views/{$code}.view.php";
  die();
}
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
  } else {
    abort();
  }
}
routeToController($uri, $routes);
