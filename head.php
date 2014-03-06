<!DOCTYPE HTML>
<html lang="en">
<title>CS 4000 job site</title>
<link rel="stylesheet" href="main.css">
<body>
<?php session_start(); ?>
<div id="navwrapper">
            <a href="index.html"><img src="{% static "DSULogo.png" %}" id="homebutton" alt="DIXIE Classifieds"></a>
            <nav id="nav">
                <a href="index.php" alt="" class="buttons">Home</a>
                <a href="listings.php" alt="" class="buttons" id="level2button">Listings</a>
                <a href="about.php" alt="" class="buttons" id="level3button">About</a>
            </nav>
        </div>
<?php
include_once('session.php');
include_once('db_functions.php');
?>
