<?php
use Http\Forms\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

$loginForm = new LoginForm;

if ($loginForm->valid($email, $password)) {
  if ((new Authenticator)->attempt($email, $password)) {
    redirect('/');
  }
  $loginForm->errorMessage('password', 'No matching account found for that email address or password.');
}

require view('sessions/login.view.php', [
  'errors' => $loginForm->errors(),
]);
