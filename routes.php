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

$router->get('/note/edit', 'controllers/notes/edit.php'); // uri to update a note
$router->patch('/note', 'controllers/notes/update.php'); // uri to save the updated note


$router->get('/register', 'controllers/registration/create.php');
$router->post('/register', 'controllers/registration/store.php');