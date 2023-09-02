<?php
use Core\App;
use Core\Database;

// $config = require basePath('config.php');
// $db = new Database($config['database']);
$db = App::resolve(Database::class);
// dd('Reached DESTROY');

$note = $db->query("select * from notes where id = :noteId", [
  'noteId' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] == 1);

$db->query('DELETE FROM notes where id = :noteId', [
  'noteId' => $_POST['id'],
]);
// redirect to posts
header('Location: '. '/notes');
exit();

