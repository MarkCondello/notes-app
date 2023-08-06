<?php
require 'functions.php';
require 'router.php';

// connect to our MySQL database.
$dsn = 'mysql:host=localhost;port=3306;dbname=notes-app;charset=utf8';
$pdo = new PDO($dsn, 'root', 'root');

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($posts);
echo '</pre>';