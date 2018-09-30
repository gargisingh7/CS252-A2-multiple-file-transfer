<!DOCTYPE html>
<html>

<body>

<h2>Search an employee</h2>


<table border=2 width=118>

<form method="GET" action="c.php">

<tr>
<th>By ID:</th></tr><br>
<tr><td><input type="number" name="ID" min="10001" max="499999" step="1" style="width:118px;"></td>
<td><input type="submit" name="submit" value="submit"></td></tr><br></form>

<form method="GET" action="c.php">
<tr>
<th>By Last Name:</th></tr>tr<br>
<tr><td><input type="text" name="lastname" style="width:118px;"  ></td>
<td><input type="submit" name="submit" value="submit"></td></tr><br></form>

<form method="GET" action="d.php">
<tr>
<th>By Department:</th></tr><br>

<tr>

<td><input type="text" name="department" style="width:118px;" pattern="d00[1-9]" ></td>
<td><input type="submit" name="submit" value="submit"></td></tr><br></table></form>

<h2>Statistics</h2>
<table style="border: 1px dashed; width: 800px;">

<form action="e.php">
<tr><td>Departments in descending order of the number of employees</td>
<td><input type="submit" name="submit" value="Click here"><br></form></td></tr>

<form method="GET" action="f.php">
<tr>
<td>Employees ordered by their tenure in department:</td>
<td><input type="text" name="department" style="width:118px;" pattern="d00[1-9]" ></td>
<td><input type="submit" name="submit" value="submit"><br></td></tr></form>

<form method="GET" action="g.php">
<tr>
<td>Find gender ratio in department:</td>
<td><input type="text" name="department" style="width:118px;" pattern="d00[1-9]" ></td>
<td><input type="submit" name="submit" value="submit"></td></tr><br></form>

<form method="GET" action="h.php">
<tr>
<td>Find gender pay ratio in department:</td>
<td><input type="text" name="department" style="width:118px;" pattern="d00[1-9]" ></td>

<td>TITLE:</td><td><input type="text" name="title" style="width:118px;"  ></td><td><input type="submit" name="submit" value="submit"></td></tr><br></form>
</table>
</body>
</html> 
