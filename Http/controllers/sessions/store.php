<?php

use Core\Database;
// use Core\Validator;
use Http\Forms\SessionForm;
use Core\App;

$db = App::resolve(Database::class);
// $errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

$sessionForm = new SessionForm;
// if (! Validator::email($email)) {
//   $errors['email'] = 'Please enter a valid email.';
// }
// if (! Validator::string($password)) {
//   $errors['password'] = 'Please enter a valid password.';
// }
if ($sessionForm->isInvalid($email, $password)) {
  require view('sessions/login.view.php', [
    'errors' => $sessionForm->errors(),
  ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  // var_dump($user);

  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email,
      'id' => $user['id']
    ]);
    header('location: /');
    exit();
  }
}

return view('sessions/login.view.php', [
  'errors' => [
    'password' => 'No matching account found for that email address or password.'
  ]
]);
