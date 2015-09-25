<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');

$id = $_POST['id'];
$notice=$_POST['name'];

$result1 = "UPDATE Notice SET notice='$notice' WHERE id='$id'";
$run = mysql_query($result1) or die("ERROR".mysql_error());

echo "<script>alert('Changed Successfully')</script>";
echo "<script>window.location.assign('previous-notice.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>