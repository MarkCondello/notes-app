<?php
// DevNote: To make this router work, we needed to force all traffic to go through this index.php file with a .htaccess redirect rule.
// DevNote: parse_url will break the uri into parts ie 'path' and 'query'.
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
function abort($code = 404){
  HTTP_response_code($code);
  require "views/{$code}.view.php";
  die();
}
$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php',
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
