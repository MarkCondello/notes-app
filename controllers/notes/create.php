<?php
use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database']);
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // dd(Validator::email('test@test.com'));
  if (isset($_POST['body'])) {
    if (! Validator::string($_POST['body'], 1, 100)) {
      $errors['body'] = 'A body of no more than 100 characters is required.';
    }
    if(empty($errors)) {
      // persist
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1,
      ]);
      //redirect with success???
    }
  } else {
    // provide error message
    $errors['body'] = 'A body is required';
  }
}

require view('notes/create.view.php', [
  'bannerTitle' => 'Create a note',
  'errors' => $errors
]);
