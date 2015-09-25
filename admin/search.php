<html>
<head>

</head>
<body bgcolor="gray">
<div align="right">
<form action="destroy.php" method="POST">
<input type="submit" value="LOGOUT"></input>
</form>
</div>
<a href="admin.php">BACK TO ADMIN PANEL</a>
<div align="center">
<br><br>
<h1>Searched Users</h1>
<br><br>
<?php

session_start();
if (isset($_SESSION['vow']))
{

include('dbcon.php');
$user ="admin";


$change=$_POST['search'];
$name=$_POST['name'];



if($change=='id')
{
echo "<table cellspacing='20' cellpadding='20'>";
echo "<tr>";
  echo "<th>Id</th>";
  echo "<th>First Name</th>";
  echo "<th>Last  Name</th>";
  echo "<th>City</th>";
  echo "<th>Email</th>";
  echo "<th>Update here</th>";
  echo "<th>Delete here</th>";
  echo "</tr>";
  echo "<font face='ALGERIAN' size='5'>UPDATE NEW DETAILS IN SPACE GIVEN BELOW";
$result = "SELECT * FROM data WHERE Id= $name";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row = mysql_fetch_array($run))
  {
  
  echo "<tr>";	
  echo   "<td>" . $row['Id'] . "</td><td>" . $row['Fname'] . "</td><td> " . $row['Lname']. "</td><td> " . $row['City']. "</td><td> " . $row['Mail'] . "</td><td><form action='adminchange.php' method='POST'><input type='hidden' name='id' value='". $row['Id'] ."'><input type='submit' value='update'></input></form></td><td><form action='admindelete.php' method='POST'><input type='hidden' name='id' value='". $row['Id'] ."'></input><input type='submit' value='delete'></input></form></td>";
  echo "</tr>";
  
  }
echo "</table>";
}

if($change=='mail')
{

echo "<table cellspacing='20' cellpadding='20'>";
echo "<tr>";
  echo "<th>Id</th>";
  echo "<th>First Name</th>";
  echo "<th>Last  Name</th>";
  echo "<th>City</th>";
  echo "<th>Email</th>";
  echo "<th>Update here</th>";
  echo "<th>Delete here</th>";
  echo "</tr>";
  echo "<font face='ALGERIAN' size='5'>UPDATE NEW DETAILS IN SPACE GIVEN BELOW";
$result = "SELECT * FROM data WHERE Mail='$name'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row = mysql_fetch_array($run))
  {
  
  echo "<tr>";	
  echo   "<td>" . $row['Id'] . "</td><td>" . $row['Fname'] . "</td><td> " . $row['Lname']. "</td><td> " . $row['City']. "</td><td> " . $row['Mail'] . "</td><td><form action='adminchange.php' method='POST'><input type='hidden' name='id' value='". $row['Id'] ."'><input type='submit' value='update'></input></form></td><td><form action='admindelete.php' method='POST'><input type='hidden' name='id' value='". $row['Id'] ."'></input><input type='submit' value='delete'></input></form></td>";
  echo "</tr>";
  
  }
echo "</table>";
}
}



?>





</form>
</div>

</body>
</html>