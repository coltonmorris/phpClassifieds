<?php
include_once('db_functions.php');

if(isset($_GET['username'])){
	$username = $_GET['username'];
	delete_row('users','username',$username);
	header("Location: admin_control.php");
}
?>
