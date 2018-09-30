<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 
$dept_no=$_GET["department"];
$F=0;
$M=0;

$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='$dept_no' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,gender FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    if($row1["gender"]=="F"){$F=$F+1;}			    
			    if($row1["gender"]=="M"){$M=$M+1;}
                      }
	        }

    }
}
$r=($F/$M);
echo "Gender ratio is $F females to $M males i.e. $r<br>";
			   
  $conn->close();
?>

