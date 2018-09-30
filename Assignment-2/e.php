<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 

$dept = "SELECT COUNT(emp_no),dept_no FROM dept_emp GROUP BY dept_no ORDER BY COUNT(emp_no) DESC";

$result = $conn->query($dept);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
         echo "" . $row["dept_no"]. " - Number of employees: " . $row["COUNT(emp_no)"]. " <br>";
    }
}

  $conn->close();
?>

