<?php
use Core\Database;
use Core\Validator;
use Core\App;

// $config = require basePath('config.php');
// $db = new Database($config['database']);
$db = App::resolve(Database::class);
$errors = [];

if (isset($_POST['body'])) {
  if (! Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more than 100 characters is required.';
  }
  if (empty($errors)) {

    var_dump($_SESSION['user']);

    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      // 'user_id' => 1,
      'user_id' => $_SESSION['user']['id'],
      // $_SESSION['user']['id']
    ]);
    // $_POST['body'] = 'CREATE ANOTHING ONE'; // reset the body field
    //redirect
    header('Location: '. '/notes');
    die();
  }
} else { // provide error message
  $errors['body'] = 'A body is required';
}

require view('notes/create.view.php', [
  'bannerTitle' => 'Create a note',
  'errors' => $errors
]);