<?php
$config = require 'config.php';

$bannerTitle = 'My note';
$db = new Database($config['database']);
$query = "select * from notes where id = :noteId";

$note = $db->query($query, [
  'noteId' => $_GET['id'],
])->fetch();

//  var_dump($note);
if (! $note) {
  abort();
} else if ($note['user_id'] != 1) {
  abort(Response::FORBIDDEN);
}

require 'views/note.view.php';