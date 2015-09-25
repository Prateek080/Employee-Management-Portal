<?php

session_start();
if (isset($_SESSION['view']))
{include('../dbcon.php');
if($_SESSION['id']==NULL)
{?>


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
		<h3>Projects</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="projectlist.php">List of Projects</a></li>
		</ul>
		
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
		
		<h4 class="alert_info">Welcome to the Employee Management System.</h4>
		
		<article class="module width_full">
	
			<header><h3>PROJECT DETAILS</h3></header>
			<div class="message_list" style="height:600px;">
			
			<div class="module_content">
			
			
				
				<?php
				$id=$_POST['id'];
				
					$result = "SELECT * FROM project WHERE id='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row=mysql_fetch_array($run)){?>
   
   <div class="message">
   <br>
   <h3>
   <p align="left">NAME : <?php
   echo $row['projectname'];
				?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				AWARDED DATE : <?php
   echo $row['date'];
   $y=$row['projectmanager'];
   $result1 = "SELECT * FROM data WHERE Email='$y'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
   echo "&nbsp;<br><br><br>PROJECT MANAGER &nbsp;:&nbsp;".$row1['Fname']."&nbsp;".$row1['Lname']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DURATION&nbsp;:&nbsp;".$row['duration'];
				?>
				
</h3>

					</div>
					<br>
					<h3>DESCRIPTION OF THE PROJECT</h3>
					<p><?php echo $row['description'];?></p>
					<?php }?>
   <br>
				<h3>PROJECT TEAM</h3>
				<br>
				<table cellspacing="10" cellpadding="10">
				
				<tr><td>PROJECT MANAGER</td><td><?php 
				$result1 = "SELECT * FROM data WHERE Email='$y'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname'];?></td>
				</tr>
				<tr>
				<td>TEAM LEADER</td><td>
				<?php $result = "SELECT TeamLeader FROM projectinfo WHERE projectid='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run);
$z=$row1['TeamLeader'];
$result1 = "SELECT * FROM data WHERE Email='$z'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname'];?></td>

				</tr>
				
				<tr>
				<td>TEAM MEMBERS</td><td>
				<?php $result = "SELECT teamM FROM projectinfom WHERE projectid='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row1=mysql_fetch_array($run)){
$z=$row1['teamM'];
$result1 = "SELECT * FROM data WHERE Email='$z'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname']."&nbsp;&nbsp;,&nbsp;&nbsp;";}?></td>

				</tr>
				</table>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<article class="module width_full">
		
					
					<h3>SELECT TEAM</h3>
			
				
					<form action='insertprojectdetail.php' method='POST'>
					<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
					<label>Team Leader</label>
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<input type="hidden" name="projectmanager" value="<?php echo $y;?>">
					<select name="user">
					<?php

$run= "SELECT Email,Fname,Lname from data WHERE Usertype='Teaml'";
$roww=mysql_query($run);
while($r=mysql_fetch_array($roww)){
echo "<option value=". $r['Email'].">".$r['Fname']. "". $r['Lname']."</option>";
}
				?>
				
				
				</select>
				</fieldset>
			
			
		</article><!-- end of messages article -->
		
		
		
		
		
		<article class="module width_3_quarter">
		
		<header><h3 class="tabs_involved">Team Members</h3></header>
<div class="message_list" style="height:300px;">
		<div class="tab_container">
			
			<table class="tablesorter" cellspacing="0"> 
			<?php
			$win="SELECT teamM FROM projectinfom WHERE projectid='$id'";
	$ww=mysql_query($win);
	$ar[]='0';
	while($rr=mysql_fetch_array($ww))
	{
	
	$ar[]=$rr['teamM'];
	}
	
$run= "SELECT Email,Fname,Lname from data WHERE Usertype='TeamM'";
$roww=mysql_query($run);
while($r=mysql_fetch_array($roww)){

     $h=$r['Email'];
	if (in_array($h,$ar))
  { }
else{
?>
		
			<tbody> 
				<tr> 
				<td><input type="checkbox" name="teamM[]" value="<?php echo $r['Email']?>"></td> 
    				<td><?php echo $r['Fname']."&nbsp;".$r['Lname']; ?></td> 
    				</tr> 
				<tr> 
   				</tbody>	
			 <?php }}?>
			</table>
			</div><!-- end of #tab1 -->
			
			</div>
		</div><!-- end of .tab_container -->
		<div class="submit_link">
					<input type="submit" value="Add Team Users" class="alt_btn">
				</div>
			
			</form>
		</article><!-- end of content manager article -->
		
		
				
			
		
		<div class="clear"></div>
		
	
		
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
<?php }
else{?>

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
		<h3>Projects</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="projectlist.php">List of Projects</a></li>
		</ul>
		
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
			<p><strong>Copyright &copy; 2008 Website Admin</strong></p>
			<p>Of <a href="http://www.Snvinfotech.com">Snv Infotech</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Welcome to the SNV Infotech Project Management System.</h4>
		
		<article class="module width_full">
	
			<header><h3>PROJECT DETAILS</h3></header>
			<div class="message_list" style="height:600px;">
			
			<div class="module_content">
			
			
				
				<?php
				$id=$_SESSION['id'];
				
					$result = "SELECT * FROM project WHERE id='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row=mysql_fetch_array($run)){?>
   
   <div class="message">
   <br>
   <h3>
   <p align="left">NAME : <?php
   echo $row['projectname'];
				?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				AWARDED DATE : <?php
   echo $row['date'];
   $y=$row['projectmanager'];
   $result1 = "SELECT * FROM data WHERE Email='$y'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
   echo "&nbsp;<br><br><br>PROJECT MANAGER &nbsp;:&nbsp;".$row1['Fname']."&nbsp;".$row1['Lname']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DURATION&nbsp;:&nbsp;".$row['duration'];
				?>
				
</h3>

					</div>
					<br>
					<h3>DESCRIPTION OF THE PROJECT</h3>
					<p><?php echo $row['description'];?></p>
					<?php }?>
   <br>
				<h3>PROJECT TEAM</h3>
				<br>
				<table cellspacing="10" cellpadding="10">
				
				<tr><td>PROJECT MANAGER</td><td><?php 
				$result1 = "SELECT * FROM data WHERE Email='$y'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname'];?></td>
				</tr>
				<tr>
				<td>TEAM LEADER</td><td>
				<?php $result = "SELECT TeamLeader FROM projectinfo WHERE projectid='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run);
$z=$row1['TeamLeader'];
$result1 = "SELECT * FROM data WHERE Email='$z'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname'];?></td>

				</tr>
				
				<tr>
				<td>TEAM MEMBERS</td><td>
				<?php $result = "SELECT teamM FROM projectinfom WHERE projectid='$id'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row1=mysql_fetch_array($run)){
$z=$row1['teamM'];
$result1 = "SELECT * FROM data WHERE Email='$z'";
$run1= mysql_query($result1) or die("ERROR".mysql_error());
$row1=mysql_fetch_array($run1);
				echo $row1['Fname']."&nbsp;".$row1['Lname']."&nbsp;&nbsp;,&nbsp;&nbsp;";}?></td>

				</tr>
				</table>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<article class="module width_full">
		
					
					<h3>SELECT TEAM</h3>
			
				
					<form action='insertprojectdetail.php' method='POST'>
					<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
					<label>Team Leader</label>
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<input type="hidden" name="projectmanager" value="<?php echo $y;?>">
					<select name="user">
					<?php

$run= "SELECT Email,Fname,Lname from data WHERE Usertype='Teaml'";
$roww=mysql_query($run);
while($r=mysql_fetch_array($roww)){
echo "<option value=". $r['Email'].">".$r['Fname']. "". $r['Lname']."</option>";
}
				?>
				
				
				</select>
				</fieldset>
			
			
		</article><!-- end of messages article -->
		
		
		
		
		
		<article class="module width_3_quarter">
		
		<header><h3 class="tabs_involved">Team Members</h3></header>
<div class="message_list" style="height:300px;">
		<div class="tab_container">
			
			<table class="tablesorter" cellspacing="0"> 
			<?php
			$win="SELECT teamM FROM projectinfom WHERE projectid='$id'";
	$ww=mysql_query($win);
	$ar[]='0';
	while($rr=mysql_fetch_array($ww))
	{
	
	$ar[]=$rr['teamM'];
	}
	
$run= "SELECT Email,Fname,Lname from data WHERE Usertype='TeamM'";
$roww=mysql_query($run);
while($r=mysql_fetch_array($roww)){

     $h=$r['Email'];
	if (in_array($h,$ar))
  { }
else{
?>
		
			<tbody> 
				<tr> 
				<td><input type="checkbox" name="teamM[]" value="<?php echo $r['Email']?>"></td> 
    				<td><?php echo $r['Fname']."&nbsp;".$r['Lname']; ?></td> 
    				</tr> 
				<tr> 
   				</tbody>	
			 <?php }}?>
			</table>
			</div><!-- end of #tab1 -->
			
			</div>
		</div><!-- end of .tab_container -->
		<div class="submit_link">
					<input type="submit" value="Add Team Users" class="alt_btn">
				</div>
			
			</form>
		</article><!-- end of content manager article -->
		
		
				
			
		
		<div class="clear"></div>
		
	
		
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

<?php }
}?>
</body>

</html>