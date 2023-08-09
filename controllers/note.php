<?php
$config = require 'config.php';
$bannerTitle = 'My note';
$db = new Database($config['database']);
$query = "select * from notes where id = :noteId";

$note = $db->query($query, [
  'noteId' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == 1);

require 'views/note.view.php';