<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
$m = new MongoDB\Client("mongodb://localhost:27017");
//echo "Connected to mongoDB<br>";

$db = $m->demo;

$collection  = $db->fir;
//echo "Connected to database $collection<br>";


 $maxineff=0;
  $p = $collection->distinct("PS");
  foreach ( $p as $station){
	$Total = $collection->count(['PS' => $station]);
	$Pending = $collection->count(['PS' => $station],['Status' =>'Pending']);
	$ratio = $Pending/$Total;
	if($ratio > $maxineff){
		$maxineff = $ratio;
		$policestation = $station;
	}
}
$maxineff=$maxineff*100;
echo "Police stations that is most inefficient $policestation: $maxineff%<br>";

?>
