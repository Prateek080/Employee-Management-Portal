<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');
$id = $_POST['id'];
$result = "DELETE FROM Department WHERE id='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());


echo "<script>window.location.assign('add-department.php')</script>";
}
else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>

