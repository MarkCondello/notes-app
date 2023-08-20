<?php
const BASE_PATH = __DIR__ . '/../'; // var_dump(BASE_PATH);
require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class){
  // dd($class);
  require basePath("Core/{$class}.php");
});

require basePath('router.php');

// $db = new Database($config['database']);
// $id = $_GET['id'];
// $query = "select * from notes where id = :id";
// // $query = "select * from posts where id = ?";
// // dd($query);
// $posts = $db->query($query, [':id' => $id])->fetch();
// // $post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);
// // echo '<pre>';
// // var_dump($posts);
// // echo '</pre>';

