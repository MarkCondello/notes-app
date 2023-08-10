<?php
$bannerTitle = 'Create a note';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['body'])) {
    // dd($_POST); //REQUEST_METHOD
    // persist
    //redirect
  } else {
    // provide error message
  }
}
require 'views/note-create.php';
