<?php

use Core\Session;
// var_dump('CREATE: ');
// var_dump( $_SESSION);

require view('sessions/login.view.php', [
  'errors' => Session::get('errors') ?? [], // errors retrieved from the store POST request
  // 'errors' => $_SESSION['_flash']['errors'] ?? [], // errors retrieved from the store POST request
]);