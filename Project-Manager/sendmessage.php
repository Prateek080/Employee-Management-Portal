<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');

if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	if (file_exists("" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
      
      }
    }

$tow=$_POST['name'];
$notice = $_POST['msg'];
$date=date("Y/m/d H:i:s");
$user=$_SESSION['user'];
$file=$_FILES["file"]["name"];

$sql = "INSERT INTO conversation(sender,reciever,messag,date,file)
VALUES
('$user','$tow','$notice','$date','$file')";

mysql_query($sql) or die("ERROR".mysql_error());

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('index.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>