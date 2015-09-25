
<html>

<head>
<title>Login</title>
<script type="text/javascript">
function validate(){

if (document.myLogin.user.value =="")
{
 alert("Username must be filled out");
 document.myLogin.user.focus();
  return false;
}
if (document.myLogin.pass.value =="")
{
	
 alert("password must be filled out");
 document.myLogin.pass.focus();
  return false;
}
else
{
	return true;
}




}
</script>
</head>

<body bgcolor="grey">
<br>
<div align="center"><h1>Login Form</h1><br><br><br>
<font face="Castellar" size="3">

<form action="check.php" name="myLogin" method="POST" onsubmit="return validate()">
<table cellspacing="20">
<tr>
<td>Email:</td>
<td><input type="text" name="user" value="Username"></input></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pass" value="Password"></input></td>
</tr>
</table>
<br><br>
<input type="submit" value="Login"></input><br><br><br>
<a href="register.php">register here</a>
</form>
</font>
</div>
</body>
</html>