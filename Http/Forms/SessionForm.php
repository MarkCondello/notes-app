<?php
namespace Http\Forms;

use Core\Validator;

class SessionForm // not sure about this class name
{
  protected $errors = [];

  function isInvalid($email, $password)
  {
    if (! Validator::email($email)) {
      $this->errors['email'] = 'Please enter a valid email.';
    }
    if (! Validator::string($password)) {
      $this->errors['password'] = 'Please enter a valid password.';
    }
    return count($this->errors) ? true : false; // Geoffrey did something different here
  }

  function errors()
  {
    return $this->errors;
  }

}