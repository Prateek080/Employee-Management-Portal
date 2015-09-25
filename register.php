<html>
<head>
<title>Registration</title>
<script type="text/javascript">
function validate(){

if (document.myReg.fname.value =="")
{
 alert("Firstname must be filled out");
 document.myReg.fname.focus();
  return false;
}


if (document.myReg.lname.value =="")
{
	
 alert("Lastname must be filled out");
 document.myReg.lname.focus();
  return false;
}


if (document.myReg.city.value =="")
{
	
 alert("City must be filled out");
 document.myReg.city.focus();
  return false;
}


if( document.myReg.mail.value == "" )
	   {
		 alert( "Please provide your Email!" );
		 document.myReg.mail.focus() ;
		 return false;
	   }
	   
	   

var x=document.forms["myReg"]["mail"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		  {
		  alert("Not a valid e-mail address");
		  return false;
		  }

if( document.myReg.pass.value == "" || document.myReg.pass.value.length <= 5 )
   {
		 alert( "Please enter a suitable Password greater than 5 characters" );
		 document.myReg.pass.focus() ;
		 return false;
   }
   
var x=document.forms["myReg"]["pass"].value;
var y=document.forms["myReg"]["cpass"].value;

if( x != y )
	   {
		 alert( "Password doesnot match" );
		 document.myReg.cpass.focus() ;
		 return false;
	   }
return true;





}
</script>
</head>
<body bgcolor="grey">
<br>
<div align="center"><h1>Registration Form</h1><br><br>
<font face="Castellar" size="3">
<form action="reg.php" name="myReg" enctype="multipart/form-data" method="POST" onsubmit="return validate()">
<table cellspacing="20">
<tr>
<td>Firstname:</td>
<td><input type="text" name="fname" value=""></input></td>
</tr>
<td>Lasttname:</td>
<td><input type="text" name="lname" value=""></input></td>
</tr>
<td>City:</td>
<td><input type="text" name="city" value=""></input></td>
</tr>
<td>Email:</td>
<td><input type="text" name="mail" value="..@.."></input></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pass" value="00000"></input></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type="password" name="cpass" value=""></input></td>
</tr>
<tr>
<td>User Type</td>
<td><select name="entry">
<option value="DepartH">Department Head</option>
<option value="Pmanager">Project Manager</option>
<option value="Teaml">Team Leader</option>
<option value="TeamM">Team Member</option>
</select>
</td>
</tr>
<tr>
<td>Department</td>
<?php
include('dbcon.php');
$result="SELECT DepartmentName FROM Department";
	$run1 = mysql_query($result) or die("ERROR".mysql_error());
	echo "<td><select name='Depart'>";
	While($row=mysql_fetch_array($run1))
	{
		echo "<option value='". $row['DepartmentName']  ."'>". $row['DepartmentName']."</option>";
	
	}
	?>
</td>
</tr>
</table>
<br>
<input type="submit" value="Register"></input><br><br><br>
<a href="login.php">Back to login</a>
</form>
</font>
</div>
</body>
</html>