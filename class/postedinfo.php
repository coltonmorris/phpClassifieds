<?php include_once('head.php') ?>
<div id="middlecolumn">
<p>
	Thank you for posting your ad! Hopefully some shmuck will fall for your scam. TROLOLol0l.

<?php
if(isset($_SESSION['RoleID']) and ($_SESSION['RoleID'] == 2 or $_SESSION['RoleID'] == 1)){
	//content with quotes buggs table
	$username = $_SESSION['username'];
	$content = "SUBJECT: $_POST[Subject] ";
	$content .= "DESCRIPTION: $_POST[Description] ";
	$content .= "COST: $_POST[Cost] ";
	$content .= "CATEGORY: $_POST[Category] ";
	$query = "insert into jobs (username,description) values ('$username','$content')";
	$results = do_query($query);
	show_table($results);
}
?>
 </p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>