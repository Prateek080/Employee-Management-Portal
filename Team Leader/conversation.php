<!doctype html>
<?php
session_start();
if (isset($_SESSION['view']))
{
?>

<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
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



include('dbcon.php');
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
	
	echo	"<h3>Conversations</h3>";
	echo	"<ul class='toggle'>";
	echo		"<li class='icn_add_user'><a href=conversation.php>Messages</a></li>";
	echo	"</ul>";
	
	echo	"<h3>Team Leader</h3>";
	echo	"<ul class='toggle'>";
	echo		"<li class='icn_add_user'><a>". $x . "</a></li>";
	echo	"</ul>";
	
	echo	"<h3>Team members</h3>";
	echo	"<ul class='toggle'>";
$result1= "SELECT Fname,Lname FROM data WHERE Usertype='TeamM' and Email != '$user' and Under='$x'";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
while($row2=mysql_fetch_array($run1))
	{
	echo		"<li class='icn_add_user'><a>". $row2['Fname'] . "&nbsp;" . $row2['Lname'] . "</a></li>";
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

	?>		
		<footer>
			<hr />
			</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	<?php

include('dbcon.php');
$user = $_SESSION['user'];



$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);
	echo "<h4 class='alert_info'>Welcome &nbsp;". $row['Fname'] ."&nbsp;". $row['Lname'] ."&nbsp; . You Logged in as a team Leader</h4>";

	?>
		
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Recent Messages</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
 
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Message</th> 
    				<th>Mail</th> 
    				<th>Time</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
				<?php
$result = "SELECT * FROM conversation WHERE reciever='$user'";
$run = mysql_query($result);
if($run){
$i=0;
while($row=mysql_fetch_array($run) and $i<= 5){
?>
				
				<td>
					<?php echo $row['messag'];?>
				</td>
				<td>
					<?php echo $row['sender'];?>
				</td>
				<td>				
				<?php echo $row['date'];
				echo "</td>";
				echo "</tr>";
				$i=$i+1;}
				}	?>
				   
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
		





			<header><h3>Messages</h3></header>
			
				
					<form action='privatemsg.php' method='POST'>
					<select name="user">
					<?php
$run= "SELECT Email,Fname,Lname from data";
$roww=mysql_query($run);
while($r=mysql_fetch_array($roww)){
echo "<option value=". $r['Email'].">".$r['Fname']. "". $r['Lname']."</option>";
}
				?>
				</select>
				<input type='submit' value='open'>
				
				</form>
			
			
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Send new message</h3></header>
			<form action='sendmessage.php' enctype="multipart/form-data" method='POST' >
				<div class="module_content">
						<fieldset>
							<label>Message To</label>
							<input type="text" name='name'>
						</fieldset>
						<fieldset>
							<label>Content</label>
							<textarea rows="12" name='msg'></textarea>
						</fieldset>
						<fieldset>
							<label>File</label>
							<input type="file" name="file" id="file">
						</fieldset>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Send" class="alt_btn">
				</div>
				</form>
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
<?php
}
else
	{echo "<script>window.location.assign('../login.php')</script>";}
?>