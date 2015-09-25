<?php

session_start();
if (isset($_SESSION['view']))
{
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
				</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the Employee Management System.</h4>
		
		
			
		<article class="module width_full">
			<header><h3>Previous notices Notice</h3></header>
				<div class="module_content">
			<?php

include('../dbcon.php');
$result1 = "SELECT * FROM Notice ORDER BY date DESC";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
echo "<table cellspacing='10' cellpadding='10' >";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Message</th>";
echo "<th>Date and Time</th>";
echo "<th>Update</th>";
echo "<th>Delete</th>";
echo "</tr>";
while($row1 = mysql_fetch_array($run1))
  {
  
  echo "<tr>";	
  echo   "<td>" . $row1['id'] . "</td><td style='height:50: width:200':>" . $row1['notice'] . "</td><td>". $row1['date'] ."</td><td><form action='noticeupdate.php' method='POST'><input type='hidden' name='id' value='". $row1['id'] ."'></input><input type='submit' value='Update'></input></form></td><td><form action='noticedelete.php' method='POST'><input type='hidden' name='id' value='". $row1['id'] ."'></input><input type='submit' value='Delete'></input></form></td>";
  echo "</tr>";
  
  }
  echo "</table>";
 
  
	?>		
				
		</div>
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

<?php }?>
</body>

</html>