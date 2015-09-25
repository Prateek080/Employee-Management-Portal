<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');
$user = $_SESSION['user'];
$newF = $_POST['name'];
$Des = $_POST['desg'];



$result1 = "UPDATE data SET Fname='$newF' WHERE Email='$user'";
$run = mysql_query($result1) or die("ERROR".mysql_error());
$result2 = "UPDATE data SET Usertype='$Des' WHERE Email='$user'";
$run = mysql_query($result2) or die("ERROR".mysql_error());



echo "<script>alert('Changed Successfully')</script>";
echo "<script>window.location.assign('admin.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>