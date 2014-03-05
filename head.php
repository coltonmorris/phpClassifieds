<!DOCTYPE HTML>
<html lang="en">
<title>CS 4000 job site</title>
<link rel="stylesheet" href="main.css">
<body>
<?php session_start(); ?>
<h1><a href='index.php' id="title">Dixie State Job Board</a></h1>
<div id="nav">
	<ul>
		<li><a href="listings.php">Listings</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="post.php">Post an Ad</a></li>
		<?php
			if (isset($_SESSION['control_panel'])){
				echo "<li><a href=$_SESSION[control_panel]>Control Panel</a></li>";
			}
		?>
	</ul>
</div> <!-- nav end -->
<?php
include_once('session.php');
include_once('db_functions.php');
?>
