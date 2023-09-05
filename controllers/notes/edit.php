<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$query = "select * from notes where id = :noteId";

$note = $db->query($query, [
  'noteId' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == 1);

require view('notes/edit.view.php', [
  'bannerTitle' => 'Edit a note',
  'errors' => [],
  'note' => $note,
]);
