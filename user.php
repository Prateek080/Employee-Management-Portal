<html>
<head>
</head>
<body bgcolor="gray">
<div align="right">
<form action="destroy.php" method="POST">
<input type="submit" value="LOGOUT"></input>
</form>
</div>

<?php

session_start();
if (isset($_SESSION['view']))
{

include('dbcon.php');
$user = $_SESSION['user'];
$result1 = "SELECT Usertype FROM data WHERE Email='$user'";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);

if($row1['Usertype'] == "DevelopH"){
$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);

echo "<div align='center'><h1>Welcome &nbsp;".$row['Fname']. "&nbsp;" . $row['Lname']."</h1><br>";
echo "Usertype: Development Head</div>";
}

if($row1['Usertype'] == "Pmanager"){
$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);

echo "<div align='center'><h1>Welcome &nbsp;".$row['Fname']. "&nbsp;" . $row['Lname']."</h1><br>";
echo "Usertype: Project Manager</div>";
}

if($row1['Usertype'] == "Teaml"){
$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);

echo "<div align='center'><h1>Welcome &nbsp;".$row['Fname']. "&nbsp;" . $row['Lname']."</h1><br>";
echo "Usertype: Team Leader</div>";
}

if($row1['Usertype'] == "TeamM"){
$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);

echo "<div align='center'><h1>Welcome &nbsp;".$row['Fname']. "&nbsp;" . $row['Lname']."</h1><br>";
echo "<h3>Usertype: Team Member</h3></div>";
}

}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>
<div align="right">
<br><br>
<a href="change.php">TO CHANGE YOUR PASSWORD CLICK HERE</a>
</div>
</body>
</html>