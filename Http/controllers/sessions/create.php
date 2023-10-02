<?php

// var_dump('CREATE: ');
// var_dump( $_SESSION);

require view('sessions/login.view.php', [
  'errors' => $_SESSION['_flash']['errors'] ?? [], // errors retrieved from the store POST request
]);