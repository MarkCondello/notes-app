<?php
namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];

  function valid($email, $password)
  {
    if (! Validator::email($email)) {
      $this->errors['email'] = 'Please enter a valid email.';
    }
    if (! Validator::string($password)) {
      $this->errors['password'] = 'Please enter a valid password.';
    }
    return count($this->errors) ? false : true; // Geoffrey did something different here
  }

  function errors()
  {
    return $this->errors;
  }

  function errorMessage($field, $message)
  {
    $this->errors[$field] = $message;
  }

}