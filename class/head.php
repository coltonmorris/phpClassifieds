<!DOCTYPE HTML>
<html lang="en">
<title>DSU Classifieds</title>
<link rel="stylesheet" href="main.css">
<body>
<div id="wrapper">
        <div id="navwrapper">
            <a href="index.html"><img src="DSULogo.png" id="homebutton" alt="DIXIE Classifieds"></a>
            <nav id="nav">
                <a href="index.php" alt="" class="buttons">Home</a>
                <a href="listings.php" alt="" class="buttons" id="level2button">Listings</a>
                <a href="about.php" alt="" class="buttons" id="level3button">About</a>
            </nav>
        </div>
<?php
include_once('session.php');
include_once('db_functions.php');
#user is logged in if allow is set
if (!isset($_SESSION['allow'])){
	if ($_SERVER['PHP_SELF'] != '/phpClassifieds/class/login.php'){
		echo "test";
		header("Location: phpClassifieds/class/login.php");
	}
}
else {
	echo "fuck this,im out";
}

?>
