<?php

// $books = [
//   [
//     'name' => 'Do Androids Dream of Electic SHeep',
//     'author' => 'Phoilip K. Dick',
//     'releaseYear' => 2021,
//     'purchaseUrl' => 'http://example.com'
//   ],
//   [
//     'name' => 'Project Hail Mary',
//     'author' => 'Andy Weir',
//     'releaseYear' => 2021,
//     'purchaseUrl' => 'http://example.com'
//   ],
//   [
//     'name' => 'The Martian',
//     'author' => 'Andy Weir',
//     'releaseYear' => 2011,
//     'purchaseUrl' => 'http://example.com'
//   ]
// ];

// $filteredBooks = array_filter($books, function($book){
//   return $book['releaseYear'] >= 1950 && $book['releaseYear'] <= 2020;
// });

// $bannerTitle = 'Home';
require view('index.view.php', [
  'bannerTitle' => 'Home',
  'foo' => 'BARR',
]);