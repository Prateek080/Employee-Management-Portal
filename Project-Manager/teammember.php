<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="../css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">Admin Area</a></h1>
				<h2 class="section_title">Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	

		</hgroup>
	</header>
	

	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Your Profile</h3>
		<ul class="toggle">
		<br>
		<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');
$user = $_SESSION['user'];
$result = "SELECT * FROM data WHERE Email='$user'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row = mysql_fetch_array($run))
  {
  

echo "<li class='icn_add_user'><a>Name:&nbsp;&nbsp;" . $row['Fname'] . "&nbsp;" . $row['Lname'] . "</a></li>";
echo "<li class='icn_add_user'><a>Mail:&nbsp;&nbsp;" . $row['Email']."</a></li>";
echo "<li class='icn_add_user'><a>Department:&nbsp;&nbsp;</a></li>";
echo "<li class='icn_add_user'><a>Designation:&nbsp;&nbsp;</a></li>";
echo "<li><a href='updateinfo.php'><input type='button' value='update profile'/></a></li>";
echo "<br>";
$x=$row['Under'];
 $y=$row['Id'];
  }
  	echo	"</ul>";
	echo	"<h3>Department Head</h3>";
	echo	"<ul class='toggle'>";
	echo		"<li class='icn_add_user'><a>". $x . "</a></li>";
	echo	"</ul>";
	
	echo	"<h3>Project Managers</h3>";
	echo	"<ul class='toggle'>";
$result1= "SELECT Fname,Lname,Email FROM data WHERE Usertype='Pmanager' and Email != '$user' and Under='$x'";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
while($row2=mysql_fetch_array($run1))
	{
	echo		"<li class='icn_add_user'><a>". $row2['Fname'] . "&nbsp;" . $row2['Lname'] . "</a></li>";
	}
	echo	"</ul>";
	
	
	echo	"<h3>Team leaders under</h3>";
	echo	"<ul class='toggle'>";
$result1= "SELECT Fname,Lname,Email FROM data WHERE Usertype='teaml' and Under='$user'";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
while($row2=mysql_fetch_array($run1))
	{
	$m=$row2['Email'];?>
	<li class='icn_add_user'><a href="teammember.php?email=<?php echo $m; ?>"><?php echo $row2['Fname'] . "&nbsp;" . $row2['Lname'] ?></a></li>
	
	<?php
	}
	echo	"</ul>";
	
	echo "<br>";
	echo "<h3>Change Password</h3>";
	echo  "<ul class='toggle'>";
	echo  "<li><a>New Password:</a><form action= 'pass.php' method='POST'><input type='hidden' name='id' value='". $y."'> </input><input type='pass' name='pass'></input><br><br><input type='submit' value='change'></form></li>";
	
	echo "</ul>";
	echo "<br>";
	echo "<h3>Admin</h3>";
	echo  "<ul class='toggle'>";
echo "<form action='destroy.php' method='POST'>";
echo "<li><a><input type='submit' value='LOGOUT'></input></form></a></li>";
echo	"</ul>";
	
}	
	?>		
		<footer>
			<hr />
			</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	<?php
if (isset($_SESSION['view']))
{

include('../dbcon.php');
$user = $_SESSION['user'];



$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);
	echo "<h4 class='alert_info'>Welcome &nbsp;". $row['Fname'] ."&nbsp;". $row['Lname'] ."&nbsp; . You Logged in as a Project Manager</h4>";
}	
else
	{echo "<script>window.location.assign('../login.php')</script>";}
?>
		
		
		<article class="module width_full">
			<header><h3>Team Members under Team Leader</h3></header>
				<div class="module_content">
<?php







echo "<table cellspacing='12' cellpadding='12'>";
echo "<tr>";
  echo "<th>Id</th>";
  echo "<th>First Name</th>";
  echo "<th>Last  Name</th>";
  echo "<th>City</th>";
  echo "<th>Email</th>";
  echo "</tr>";

$email=$_GET['email'];

	$result = "SELECT * FROM data WHERE Under='$email' and Usertype='TeamM'";
	$run = mysql_query($result) or die("ERROR".mysql_error());
	while($row = mysql_fetch_array($run))
  {
  
  echo "<tr>";	
  echo   "<td>" . $row['Id'] . "</td><td>" . $row['Fname'] . "</td><td> " . $row['Lname']. "</td><td> " . $row['City']. "</td><td> " . $row['Email'] . "</td><td>";
  echo "</tr>";
  
  }
	echo "</table>";
	echo	"</ul>";
?>
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		<h4 class="alert_warning">A Warning Alert</h4>
		
		<h4 class="alert_error">An Error Message</h4>
		
		<h4 class="alert_success">A Success Message</h4>
		
		<article class="module width_full">
			<header><h3>Basic Styles</h3></header>
				<div class="module_content">
					<h1>Header 1</h1>
					<h2>Header 2</h2>
					<h3>Header 3</h3>
					<h4>Header 4</h4>
					<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

<p>Donec id elit non mi porta <a href="#">link text</a> gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>

					<ul>
						<li>Donec ullamcorper nulla non metus auctor fringilla. </li>
						<li>Cras mattis consectetur purus sit amet fermentum.</li>
						<li>Donec ullamcorper nulla non metus auctor fringilla. </li>
						<li>Cras mattis consectetur purus sit amet fermentum.</li>
					</ul>
				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>


