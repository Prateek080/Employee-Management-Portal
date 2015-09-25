<html>
<head>
</head>
<body bgcolor="grey">
<br>
<div align="center"><h1>Registration UNDER</h1><br><br>
<font face="Castellar" size="3">


<?php
include("dbcon.php");



$fname=$_POST['fname'];
$lname=$_POST['lname'];
$city=$_POST['city'];
$email=$_POST['mail'];
$pass=$_POST['pass'];
$date=date("Y/m/d");
$utype=$_POST['entry'];
$depart=$_POST['Depart'];


$sql="INSERT INTO data(Fname,Lname,City,Email,Password,Usertype,Department,date)
VALUES
('$fname','$lname','$city','$email','$pass','$utype','$depart','$date')";

$run=mysql_query($sql);


if (!$run)
  {
  die('Error: ' . mysql_error($run));
  }
  else
  {
	if($utype=='Pmanager'){
	$result="SELECT Fname,Lname,Email FROM data WHERE Usertype='DevelopH'";
	$run1 = mysql_query($result) or die("ERROR".mysql_error());
	echo "<form action='utype.php' method='POST'>";
	echo "<h3>Under</h3><select name='under'>";
	While($row=mysql_fetch_array($run1))
	{
		echo "<option value='". $row['Email']  ."'>".$row['Fname']. "&nbsp;" . $row['Lname'] ."</option>";
	
	}
	echo "<input type='hidden' name='email' value='".$email."'></input>";
	echo "<input type='submit' value='Register'></input></form><br><br><br>";
  }
  
	if($utype=='DepartH'){
	$result="SELECT Fname,Lname,Email FROM data WHERE Usertype='admin'";
	$run1 = mysql_query($result) or die("ERROR".mysql_error());
	echo "<form action='utype.php' method='POST'>";
	echo "<h3>Under</h3><select name='under'>";
	While($row=mysql_fetch_array($run1))
	{
		echo "<option value='". $row['Email']  ."'>".$row['Fname']. "&nbsp;" . $row['Lname'] ."</option>";
	
	}
	echo "<input type='hidden' name='email' value='".$email."'></input>";
	echo "<input type='submit' value='Register'></input></form><br><br><br>";
  }
  
  	if($utype=='Teaml'){
	$result="SELECT Fname,Lname,Email FROM data WHERE Usertype='Pmanager'";
	$run1 = mysql_query($result) or die("ERROR".mysql_error());
	echo "<form action='utype.php' method='POST'>";
	echo "<h3>Under</h3><select name='under'>";
	While($row=mysql_fetch_array($run1))
	{
		echo "<option value='". $row['Email']  ."'>".$row['Fname']. "&nbsp;" . $row['Lname'] ."</option>";
	
	}
	echo "<input type='hidden' name='email' value='".$email."'></input>";
	echo "<input type='submit' value='Register'></input></form><br><br><br>";
  }
  
  	if($utype=='TeamM'){
	$result="SELECT Fname,Lname,Email FROM data WHERE Usertype='Teaml'";
	$run1 = mysql_query($result) or die("ERROR".mysql_error());
	echo "<form action='utype.php' method='POST'>";
	echo "<h3>Under</h3><select name='under'>";
	While($row=mysql_fetch_array($run1))
	{
		echo "<option value='". $row['Email']  ."'>".$row['Fname']. "&nbsp;" . $row['Lname'] ."</option>";
	
	}
	echo "<input type='hidden' name='email' value='".$email."'></input>";
	echo "<input type='submit' value='Register'></input></form><br><br><br>";
  }
  
  

}



?>
</font>
</div>
</body>
</html>