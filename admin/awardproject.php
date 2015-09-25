<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');


$tow=$_POST['pname'];
$notice = $_POST['desc'];
$name=$_POST['name'];
$date=date("Y/m/d H:i:s");
$dur=$_POST['dur'];

$sql = "INSERT INTO project(projectname,projectmanager,description,date,duration)
VALUES
('$tow','$name','$notice','$date','$dur')";

mysql_query($sql) or die("ERROR".mysql_error());

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('projectlist.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>