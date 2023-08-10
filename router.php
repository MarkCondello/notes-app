<?php
$routes = require('routes.php');
// DevNote: To make this router work, we needed to force all traffic to go through this index.php file with a .htaccess redirect rule.
// DevNote: parse_url will break the uri into parts ie 'path' and 'query'.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
function abort($code = Response::NOT_FOUND){
  HTTP_response_code($code);
  require "views/{$code}.view.php";
  die();
}
function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
  } else {
    abort();
  }
}
routeToController($uri, $routes);
