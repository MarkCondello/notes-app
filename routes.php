<?php
// this is how we append to the routes array in Router.php
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php'); // uri to create a note
$router->delete('/note', 'notes/destroy.php');
$router->post('/notes', 'notes/store.php'); // uri to save the note

$router->get('/note/edit', 'notes/edit.php'); // uri to update a note
$router->patch('/note', 'notes/update.php'); // uri to save the updated note


$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/logout', 'sessions/destroy.php')->only('auth');