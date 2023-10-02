<?php
use Core\Database;
use Core\Validator;
use Core\App;

// This probs needs it own Form class

$db = App::resolve(Database::class);
$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if (! Validator::email($email)) {
  $errors['email'] = 'Please enter a valid email.';
}
if (! Validator::string($password, 3, 255)) {
  $errors['password'] = 'Please enter a valid password.';
}

if (!empty($errors)) {
  require view('registration/create.view.php', [
    'bannerTitle' => 'Register..',
    'errors' => $errors
  ]);
}

$bd = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  redirect('/login');
  // header('location: /'); // todo: send user to login
  // exit();
} else {
  $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    // 'password' => $password // don't ever save passwords like this
    'password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

  $_SESSION['user'] = [
    'email' => $email,
  ];

  redirect('/');
  // header('location: /');
  // exit();
}
