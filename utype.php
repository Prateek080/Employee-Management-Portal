<?php
include("dbcon.php");



$mail=$_POST['email'];
$under=$_POST['under'];

$sql="UPDATE data
SET Under='$under'
WHERE Email='$mail'";

$run=mysql_query($sql) or die("ERROR".mysql_error());
echo "<script>alert('Successfully Registered')</script>";
echo "<script>window.location.assign('login.php')</script>";

?>
