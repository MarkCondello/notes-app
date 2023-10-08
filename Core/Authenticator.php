<?php

namespace Core;

use Core\Database;
use Core\Session;

class Authenticator
{

  function attempt($email, $password)
  {
    // $db = App::resolve(Database::class);
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
      'email' => $email,
    ])->find();
    // var_dump($user);
    if ($user) {
      if (password_verify($password, $user['password'])) {
        $this->login([
          'email' => $email,
          'id' => $user['id']
        ]);
        return true;
      }
    }
    return false;
  }

  public function logout()
  {
    Session::destroy();
    // $_SESSION = [];
    // session_destroy();
    // $cookie = session_get_cookie_params();
    // setcookie('PHPSESSID', '', time() - 3600, '/', $cookie['domain'], $cookie['secure'], $cookie['httponly']);
  }
  
  public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email'],
      'id' => $user['id'],
    ];
  
    session_regenerate_id(true);
  }
}