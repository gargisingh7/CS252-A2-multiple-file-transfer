<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
$m = new MongoDB\Client("mongodb://localhost:27017");
//echo "Connected to mongoDB<br>";

$db = $m->demo;

$collection  = $db->fir;
//echo "Connected to database $collection<br>";

  $max=0;
  $c = $collection->distinct("DISTRICT");
  foreach ( $c as $district ){
	$count = $collection->count(['DISTRICT' => $district]);
	if($count > $max){
		$max = $count;
		$ans = $district;
	}
}
echo "District with most crimes is $ans: $max<br>";
?>
