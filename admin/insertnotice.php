<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');

$notice = $_POST['notice'];
$date=date("Y/m/d H:i:s");


$sql = "INSERT INTO Notice(date,notice)
VALUES
('$date','$notice')";

mysql_query($sql) or die("ERROR".mysql_error());

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('admin.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>