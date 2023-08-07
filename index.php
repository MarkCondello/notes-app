<?php
require 'functions.php';
require 'router.php';
require 'Database.php';
$config = require 'config.php';
// connect to our MySQL database.

$db = new Database($config['database']);

$id = $_GET['id'];
$query = "select * from posts where id = :id";
// $query = "select * from posts where id = ?";

// dd($query);

$posts = $db->query($query, [':id' => $id])->fetch();
// $post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($posts);
echo '</pre>';