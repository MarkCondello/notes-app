<?php

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

function dd($val){
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
