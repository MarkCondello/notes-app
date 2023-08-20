<?php
use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$query = "select * from notes where user_id = :userId";
$notes = $db->query($query, ['userId' => 1])->get();

// require 'views/notes/index.view.php';

require view('notes/index.view.php', [
  'bannerTitle' => 'My notes',
  'notes' => $notes,
]);
