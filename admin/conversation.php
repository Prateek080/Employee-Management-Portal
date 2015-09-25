<?php

session_start();
if (isset($_SESSION['view']))
{include('../dbcon.php');
?>


<!doctype html>
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
			<h1 class="site_title"><a href="admin.php">Website Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="admin.php">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<a class="logout_user" href="logout.php" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="admin.php">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Notice</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="new-notice.php">New Notice</a></li>
			<li class="icn_edit_article"><a href="previous-notice.php">Previous Notices</a></li>
		</ul>
		
		<h3>Message</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="new-message.php">New Message</a></li>
			<li class="icn_edit_article"><a href="all-previous-message.php">All Previous Message</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="add-new-user.php">Add New User</a></li>
			<li class="icn_view_users"><a href="view-user.php">View Users</a></li>
			<li class="icn_profile"><a href="admin-profile.php">Your Profile</a></li>
		</ul>
		
		<h3>Conversations</h3>
	<ul class='toggle'>
	<li class='icn_add_user'><a href=conversation.php>Messages</a></li>
	</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
		<li class="icn_settings"><a href="add-department.php">Department</a></li>
			<li class="icn_settings"><a href="change-password.php">Change Password</a></li>
			<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
		</ul>
		
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
	echo "<h4 class='alert_info'>Welcome &nbsp;". $row['Fname'] ."&nbsp;". $row['Lname'] ."&nbsp; . You Logged in as a Admin</h4>";

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