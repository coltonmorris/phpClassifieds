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
<meta charset="utf-8">
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
                <a href="index.php" class="buttons">Home</a>
                <a href="listings.php" class="buttons" id="level2button">Listings</a>
                <a href="about.php" class="buttons" id="level3button">About</a>
            </nav>
        </div>
        
        <!--I want a php if statement that checks if we are logged in before displaying these buttons -->
        <div class="logoutbutton">
        	<a href="logout.php">Logout</a>
        </div>
        <div class="postbutton">
        	<a href="post.php">Post and Ad</a>
        </div>
<?php
include_once('session.php');
include_once('db_functions.php');
#user is logged in if allow is set
?>
