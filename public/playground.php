<?php
use Illuminate\Support\Collection;
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'vendor/autoload.php';

$numbers = new Collection([
  1,2,3,4,5,6,7,8,9,10
]);

if ($numbers->contains(10)) {
  echo "10 is in the collection";
  echo "<br/>";
} else {
  echo "10 is not in the collection";
  echo "<br/>";
}

$lessThanEqualToFive = $numbers->filter(function($number){
  return $number <= 5;
});

var_dump($lessThanEqualToFive);

// Note: run "php public/playground.php" in the terminal to see the output of this file.