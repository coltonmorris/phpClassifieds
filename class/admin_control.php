<?php 
include_once('head.php');
//do not allow people access to page is they are not an admin
if ($_SESSION['RoleID'] != 1){
	echo "<div class='listheads'>Listings</div>";
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$query = "select * from listings";
	$results = do_query($query);
	show_listings_admin($results);
	echo "<hr>";
	echo "<div class='listheads'>Users</div>";
	$query = "select * from users";
	$results = do_query($query);
	show_user_admin($results);
}
else {
	echo "You do not have permission to visit this page";
}
?>
<?php include_once('foot.php') ?>
