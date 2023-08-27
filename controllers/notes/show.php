<?php
use Core\Database;
use Core\App;

// $config = require basePath('config.php');
// $db = new Database($config['database']);
$db = App::resolve(Database::class);
$query = "select * from notes where id = :noteId";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   dd('REACHED DESTROY');
//   $note = $db->query($query, [
//     'noteId' => $_GET['id'],
//     ])->findOrFail();

//   authorize($note['user_id'] == 1);

//   $db->query('DELETE FROM notes where id = :noteId', [
//     'noteId' => $_POST['noteId'],
//   ]);
//   // redirect to posts
//   header('Location: '. '/notes');
//   exit();

// } else {

  $note = $db->query($query, [
    'noteId' => $_GET['id'],
    ])->findOrFail();

  authorize($note['user_id'] == 1);

  require view('notes/show.view.php', [
    'bannerTitle' => 'My note',
    'note' => $note,
  ]);
// }
