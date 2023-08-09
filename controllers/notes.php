<?php
$config = require 'config.php';

$bannerTitle = 'My notes';
$db = new Database($config['database']);
$query = "select * from notes where user_id = 1";
// $query = "select * from posts where id = ?";
// dd($query);
$notes = $db->query($query)->fetchAll();

require 'views/notes.view.php';
