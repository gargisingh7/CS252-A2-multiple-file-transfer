<html>
<body>
<h2>The employees are</h2><p>
</body>

<table>



<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 
$ID=$_GET["ID"];
$lastname=$_GET["lastname"];

// collect value of input field

//echo "ID = $name<br>";

$name = "SELECT emp_no,first_name, last_name FROM employees";
$a=0;

$result = $conn->query($name);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($row["emp_no"] == $ID){
		echo "<tr><td>ID: </td><td>" . $row["emp_no"]. "</td><td> - Name: </td><td>" . $row["first_name"]. " " . $row["last_name"]. "</td></tr><br>";
		$a = $a+1; }
	if($row["last_name"] == $lastname){
		echo "<tr><td>ID: </td><td>" . $row["emp_no"]. "</td><td> - Name: </td><td>" . $row["first_name"]. " " . $row["last_name"]. "</td></tr><br>"; 
		$a = $a+1; }
    }
} 
else {
    echo "0 results";
}
if($a==0){ echo "Incorrect query";}
  $conn->close();
?>
</table></html>
