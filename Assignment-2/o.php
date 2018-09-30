<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
$m = new MongoDB\Client("mongodb://localhost:27017");
//echo "Connected to mongoDB<br>";

$db = $m->demo;

$collection  = $db->fir;
//echo "Connected to database $collection<br>";
  $maxlawcnt=0;
  $minlawcnt=INF;
  
  $l = $collection->distinct("Act_Section");
  foreach ( $l as $law){
	$lawcount = $collection->count(['Act_Section' => $law]);
	if($lawcount > $maxlawcnt){
		$maxlawcnt = $lawcount;
		$maxlaw = $law;	
	}
	if($lawcount < $minlawcnt){
		$minlawcnt = $lawcount;
		$minlaw = $law;
	}
}
echo "Crime law most applied in FIRs is $maxlaw<br>";
echo "Crime law least applied in FIRs is $minlaw<br>";

?>
