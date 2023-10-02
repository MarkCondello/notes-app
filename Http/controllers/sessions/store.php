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

$_SESSION['_flash']['errors'] = $loginForm->errors();

redirect('/login');




// We dont want to return a view from a POST request as it breaks the back button and allows the user to resubmit the same form with a refresh.
// Always use a redirect GET after a POST request and use $_SESSION superglobals to pass errors to the GET.

// require view('sessions/login.view.php', [
//   'errors' => $loginForm->errors(),
// ]);
