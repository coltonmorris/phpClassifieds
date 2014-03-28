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
<link rel="stylesheet" href="shadowbox.css">
<link rel="stylesheet" href="iList.css">
<!-- load jQuery and the plugins -->
	<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
    <script src="js/shadowbox.js"></script>
<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<div id="wrapper">
        <div id="navwrapper">
            <a href="index.php"><img src="logo.png" id="homebutton" alt="DIXIE Classifieds"></a>
            <nav id="nav">
                <a href="index.php" class="buttons">Home</a>
                <a href="listings.php" class="buttons" id="level2button">Listings</a>
                <a href="about.php" class="buttons" id="level3button">About</a>
            </nav>
        </div>
        
        <!--I want a php if statement that checks if we are logged in before displaying these buttons -->
<?php
if (isset($_SESSION['username'])){
	echo "<a href='logout.php' class='logoutbutton'>Logout</a>";
	echo "<a href='post.php' class='postbutton'>Post an Ad</a>";
}
include_once('session.php');
include_once('db_functions.php');
#user is logged in if allow is set
?>
