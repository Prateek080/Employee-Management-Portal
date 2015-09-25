<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');
$id = $_POST['id'];
$result = "DELETE FROM Notice WHERE id='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());


echo "<script>window.location.assign('previous-notice.php')</script>";
}
else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>

