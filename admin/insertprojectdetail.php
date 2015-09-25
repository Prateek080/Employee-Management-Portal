<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');


$id=$_POST['id'];
$name=$_POST['projectmanager'];
$dur=$_POST['user'];
$_SESSION['id']=$id;
$sql = "INSERT INTO projectinfo(projectid,projectmanager,TeamLeader)
VALUES
('$id','$name','$dur')";

mysql_query($sql);


foreach ($_POST['teamM'] as $value) {
$sql = "INSERT INTO projectinfom(projectid,teamM)
VALUES
('$id','$value')";

mysql_query($sql) or die("ERROR".mysql_error());
        }

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('projectdetail.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>