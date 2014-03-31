<?php 
include_once('head.php');
//do not allow people access to page is they are not an admin
if ($_SESSION['RoleID'] == 1){
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
	echo	"<div class='content'>";
	echo	"<h2>";
    echo 		"404!";
    echo	"</h2>";
	echo "	Looks like you Got lost! Here's some music to cheer you up!<br>
				<div id='lost'>
					<iframe width='560' height='315' src='//www.youtube.com/embed/32eywT-bQhQ' frameborder='0' allowfullscreen></iframe>
				</div>
			</div>";
}
?>
<?php include_once('foot.php') ?>
