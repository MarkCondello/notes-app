<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);
$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if (! Validator::email($email)) {
  $errors['email'] = 'Please enter a valid email.';
}
if (! Validator::string($password)) {
  $errors['password'] = 'Please enter a valid password.';
}

if (!empty($errors)) {
  require view('sessions/create.view.php', [
    'bannerTitle' => 'Register..',
    'errors' => $errors
  ]);
}

login([
  'email' => $email,
]);



// dd('Login user');

// if ($user) {
//   header('location: /');
//   exit();
// } else {
//   $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
//     'email' => $email,
//     'password' => $password
//   ]);

//   login($user);
//   header('location: /');
//   exit();
// }





// $bd = App::resolve(Database::class);
// $user = $db->query('SELECT * FROM users WHERE email = :email', [
//   'email' => $email
// ])->find();

// if ($user) {
//   header('location: /'); // todo: send user to login
//   exit();
// } else {
//   $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
//     'email' => $email,
//     // 'password' => $password // don't ever save passwords like this
//     'password' => password_hash($password, PASSWORD_BCRYPT)
//   ]);

//   $_SESSION['user'] = [
//     'email' => $email,
//   ];

//   header('location: /'); // todo: send user to account
//   exit();
// }
