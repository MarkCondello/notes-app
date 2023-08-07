<?php
require 'functions.php';
require 'router.php';
require 'Database.php';
// connect to our MySQL database.

$db = new Database();
$posts = $db->query("select * from posts")->fetchAll();
// $post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($posts);
echo '</pre>';