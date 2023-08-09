<?php
$config = require 'config.php';

$bannerTitle = 'My note';
$db = new Database($config['database']);
$query = "select * from notes where id = :noteId";
// $query = "select * from posts where id = ?";
// dd($query);
$note = $db->query($query, ['noteId' => $_GET['id']])->fetch();

require 'views/note.view.php';
