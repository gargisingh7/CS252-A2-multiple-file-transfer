<html>
<body>
<h2>The employees are</h2><p>
</body>

<table border=2>


<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 

$department=$_GET["department"];

$dept = "SELECT emp_no,dept_no FROM dept_emp";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
         if($row["dept_no"] == $department)
	 { 
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "<tr><td>ID: </td><td>" . $row1["emp_no"]. "</td><td> - Name: " . $row1["first_name"]. " " . $row1["last_name"]. "</td></tr><br>";
			    
                      }
	        }
	  }
    }
} else {
    echo "0 results";
}

  $conn->close();
?>
</table>
</html>
