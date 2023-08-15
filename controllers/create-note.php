<?php
$config = require 'config.php';
$db = new Database($config['database']);
$bannerTitle = 'Create a note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];
  if (isset($_POST['body'])) {
    if (strlen($_POST['body']) === 0) {
      $errors['body'] = 'A body is required';
    }
    if (strlen($_POST['body']) > 100) {
      $errors['body'] = 'The body can not be more than 100 characters.';
    }
    if(empty($errors)) {
      // persist
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1,
      ]);
      //redirect
    }
  } else {
    // provide error message
  }
}
require 'views/note-create.php';