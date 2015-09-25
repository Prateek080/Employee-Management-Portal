<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');

$id = $_POST['id'];
$name=$_POST['name'];

$result1 = "UPDATE Department SET DepartmentName='$name' WHERE id='$id'";
$run = mysql_query($result1) or die("ERROR".mysql_error());

echo "<script>alert('Changed Successfully')</script>";
echo "<script>window.location.assign('add-department.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>