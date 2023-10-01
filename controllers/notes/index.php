<?php
use Core\Database;
use Core\App;

// $config = require basePath('config.php');
// $db = new Database($config['database']);
$db = App::resolve(Database::class);

$query = "select * from notes where user_id = :userId";
$notes = $db->query($query, ['userId' => $_SESSION['user']['id']])->get();

require view('notes/index.view.php', [
  'bannerTitle' => 'My notes',
  'notes' => $notes,
]);
