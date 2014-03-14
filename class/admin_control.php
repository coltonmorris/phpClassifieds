<?php include_once('head.php'); ?>
<div id="middlecolumn">
<?php
if (!isset($_SESSION['control_panel']) || $_SESSION['control_panel'] != 'admin_control.php'){
	header('Location: index.php');
}
echo "<div class='listheads'>Listings</div>";
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$query = "select * from jobs";
$results = do_query($query);
show_job_admin($results);
echo "<hr>";
echo "<div class='listheads'>Users</div>";
$query = "select * from users";
$results = do_query($query);
show_user_admin($results);
?>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
