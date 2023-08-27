<?php
// this is how we append to the routes array in Router.php
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php'); // uri to create a note
$router->delete('/note', 'controllers/notes/destroy.php');
$router->post('/notes', 'controllers/notes/store.php'); // uri to save the note