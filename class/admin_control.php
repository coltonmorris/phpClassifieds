<?php include_once('head.php'); ?>
<div id="middlecolumn">
<p>
<?php
if (!isset($_SESSION['control_panel']) || $_SESSION['control_panel'] != 'admin_control.php'){
	header('Location: index.php');
}
echo "Listings<hr>";
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$query = "select * from jobs";
$results = do_query($query);
show_job_admin($results);
echo "<hr>";
echo "Users<hr>";
$query = "select * from users";
$results = do_query($query);
show_user_admin($results);
?>
</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
