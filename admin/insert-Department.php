<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');

$dep = $_POST['Ndep'];



$sql = "INSERT INTO Department(DepartmentName)
VALUES
('$dep')";

mysql_query($sql) or die("ERROR".mysql_error());

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('add-department.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>