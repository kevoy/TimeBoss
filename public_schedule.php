<?php
require_once('optimised_schedule.php');
require_once('access_group.php');
User::loginRequired();
$group_owner = null;
if(isset($_REQUEST['group_id'])){
	$group_id = $_REQUEST['group_id'];
	$group = new AccessGroup($group_id);
	$group_owner = $group->getOwner()->getUserEmail();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account - Time Boss</title>
	<link rel="stylesheet" href="stylesheets/bootstrap/css/bootstrap.min.css" type="text/css" >
	<script src="stylesheets/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="stylesheets/main.css" type="text/css" >
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans|Audiowide|Play">
	<script type="text/javascript" src="scripts/prototype.js"></script>


</head>
<body>
	<?php include 'header-template.php'; ?>
	
	<div id="profile_main_container" class="row margin-0">
		<div class='col-md-2' id="left-bar">
			
		</div>
		<div class='col-md-10' id="right-bar">
			<div id="main-panel" class="col-md-12">
				<h3 class="c_subtitle"><?php echo $group_owner ."'s Calendar"; ?></h3>
				<?php include 'calendar-template.php'; ?>
			</div>

		</div>
		<div id="popup-back">
			<div id="popup-box">
				<h4 id="popup-title">Processing Information</h4>
				<div id="popup-body">
					<div id="processing-img"></div>
				</div>
			</div>
		</div>
</body>


</html>