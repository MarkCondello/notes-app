<?php
use Core\Database;
use Core\Validator;
use Core\App;

// dd($_POST);

$db = App::resolve(Database::class);
$errors = [];

$query = "select * from notes where id = :id";

$note = $db->query($query, [
  'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] == $_SESSION['user']['id']);

if (isset($_POST['body'])) {
  if (! Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more than 100 characters is required.';
  }
  if (empty($errors)) {
    $db->query('UPDATE notes SET body = :body WHERE id = :id', [
      'id' => $_POST['id'],
      'body' => $_POST['body'],
    ]);

    redirect('/note?id=' . $_POST['id']);
    // header('Location: '. '/note?id=' . $_POST['id']);
    // die();
  }
} else { // provide error message
  $errors['body'] = 'A body is required';
}

require view('notes/edit.view.php', [
  'bannerTitle' => 'Update note...',
  'errors' => $errors,
  'note' => $note,
]);
