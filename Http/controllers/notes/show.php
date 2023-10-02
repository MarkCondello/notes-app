<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$query = "select * from notes where id = :noteId";

$note = $db->query($query, [
  'noteId' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == $_SESSION['user']['id']);

require view('notes/show.view.php', [
  'bannerTitle' => 'My note',
  'note' => $note,
]);

