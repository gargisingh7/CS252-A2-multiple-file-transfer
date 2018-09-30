<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 
$dept=$_GET["department"];

if($dept=="d001"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d001' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }

    }
}
}
if($dept=="d002"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d002' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d003"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d003' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d004"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d004' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d005"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d005' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d006"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d006' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d007"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d007' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d008"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d008' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
if($dept=="d009"){
$dept = "SELECT emp_no,dept_no,to_date,from_date FROM dept_emp WHERE dept_no='d009' ORDER BY DATEDIFF(from_date,to_date) ";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
		$ID=$row["emp_no"];
		$name = "SELECT emp_no,first_name,last_name FROM employees WHERE emp_no=$ID";
		$rslt = $conn->query($name);
     	       if ($rslt->num_rows > 0) 
	       {      
    		      while($row1 = $rslt->fetch_assoc()) 
		      {
			    
			    echo "ID: " . $row1["emp_no"]. " - Name: " . $row1["first_name"]. " " . $row1["last_name"]. " From  " . $row["from_date"]. " To " . $row["to_date"]. "<br>";
			    
                      }
	        }


    }
}
}
  $conn->close();
?>

