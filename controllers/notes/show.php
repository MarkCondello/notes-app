<?php
use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);
$query = "select * from notes where id = :noteId";

$note = $db->query($query, [
  'noteId' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == 1);

require view('notes/show.view.php', [
  'bannerTitle' => 'My note',
  'note' => $note,
]);
