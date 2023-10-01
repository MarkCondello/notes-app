<?php
use Core\Response;

function logout(){
  $_SESSION = [];
  session_destroy();
  $cookie = session_get_cookie_params();
  setcookie('PHPSESSID', '', time() - 3600, '/', $cookie['domain'], $cookie['secure'], $cookie['httponly']);
}

function login($user) {
  // var_dump('in login method', $user);
  $_SESSION['user'] = [
    'email' => $user['email'],
    // probs needs an id yeah?
    'id' => $user['id'],
  ];

  session_regenerate_id(true);
}

function menuClasses($urlPage) {
  $classes = 'rounded-md px-3 py-2 text-sm font-medium ';
  isCurrentPage($urlPage) ? $classes .= 'bg-gray-900 text-white' : $classes .= 'text-gray-300 hover:bg-gray-700 hover:text-white';
  return "class='" . $classes . "'";
}
function menuAria($urlPage) {
  if (isCurrentPage($urlPage)) :
   return 'aria-current="page"';
  endif;
}
function isCurrentPage($urlPage = '/') {
  $url = $_SERVER['REQUEST_URI'];
  return $url === $urlPage;
}
function dd($val) {
  echo '<pre>';
  var_dump($val);
  echo '</pre>';
  die();
}
function authorize($stmnt, $status = Response::FORBIDDEN){
  if (!$stmnt) {
    abort($status);
  }
}
function basePath($path) {
    // dd($path);
 return BASE_PATH . $path;
}
function view($path, $attrs = []) {
    // dd(basePath('views/' . $path));
  extract($attrs); // this extracts the $attrs associated array and makes them publicly available or something
  require basePath('views/' . $path);

  // return require basePath('views/' . $path);
}
function abort($code = Response::NOT_FOUND)
{
  HTTP_response_code($code);
  require basePath("views/{$code}.view.php"); // load view from the root dir
  die();
}
