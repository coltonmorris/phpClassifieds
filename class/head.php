<?php session_start(); 
if (!isset($_SESSION['allow'])){
	if ($_SERVER['PHP_SELF'] != '/phpClassifieds/class/login.php' &&
			$_SERVER['PHP_SELF'] != '/phpClassifieds/class/log.php' &&
			$_SERVER['PHP_SELF'] != '/phpClassifieds/class/create_user.php'){
		header('Location: http://www.ataxicdesign.com/phpClassifieds/class/login.php');
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>DSU Classifieds</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="bjqs.css">
<link rel="stylesheet" href="slider.css">
<link rel="stylesheet" href="foot.css">
<!-- load jQuery and the plugin -->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
<link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
<div id="wrapper">
        <div id="navwrapper">
            <a href="index.php"><img src="images/logo.png" id="homebutton" alt="DIXIE Classifieds"></a>
            <nav id="nav">
                <a href="index.php" alt="" class="buttons">Home</a>
                <a href="listings.php" alt="" class="buttons" id="level2button">Listings</a>
                <a href="about.php" alt="" class="buttons" id="level3button">About</a>
            </nav>
        </div>
        <div class="logoutbutton">
            	<a href="logout.php">Logout</a>
            </div>
<?php
include_once('session.php');
include_once('db_functions.php');
#user is logged in if allow is set
?>
