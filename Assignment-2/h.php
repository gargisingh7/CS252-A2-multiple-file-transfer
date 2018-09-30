<?php
  $conn = new mysqli("localhost", "root", "root", "employees");
  
  if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
  } 
$dept_no=$_GET["department"];
$title=$_GET["title"];

if($dept_no!=NULL && $title!=NULL)
	{
		$sql="SELECT sum(salary) FROM salaries WHERE emp_no IN(SELECT emp_no FROM employees WHERE emp_no IN(SELECT emp_no FROM titles WHERE title='$title' AND emp_no IN (SELECT emp_no FROM dept_emp WHERE dept_no IN (SELECT dept_no FROM departments WHERE dept_no='$dept_no'))) AND gender='M') AND to_date IN (SELECT max(to_date) FROM salaries WHERE emp_no IN (SELECT emp_no FROM titles))";
		$result = $conn->query($sql);
		if($row = $result->fetch_assoc())
		{
			$v1=$row['sum(salary)'];
			$sql="SELECT sum(salary) FROM salaries WHERE emp_no IN(SELECT emp_no FROM employees WHERE emp_no IN(SELECT emp_no FROM titles WHERE title='$title' AND emp_no IN (SELECT emp_no FROM dept_emp WHERE dept_no IN (SELECT dept_no FROM departments WHERE dept_no='$dept_no'))) AND gender='F') AND to_date IN (SELECT max(to_date) FROM salaries WHERE emp_no IN (SELECT emp_no FROM titles))";
			$result = $conn->query($sql);
			if($row = $result->fetch_assoc())
			{
				$v2=$row['sum(salary)'];
				if($v2!=0)
					echo $dept_no." (gender pay [female to male] ratio for ".$title." ) : ".($v2/$v1);
				else
					echo "There are no females in ".$dept_no." working as ".$title;
			}
		}
	}
  $conn->close();
?>

