<?php
$config = require 'config.php';
$bannerTitle = 'My notes';
$db = new Database($config['database']);
$query = "select * from notes where user_id = :userId";
$notes = $db->query($query, ['userId' => 1])->get();

require 'views/notes/index.view.php';
