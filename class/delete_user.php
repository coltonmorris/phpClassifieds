<?php
include_once('db_functions.php');

//wont delete an admin. Admins can only be deleted using the web host
if(isset($_GET['username']) && $_GET['RoleID'] != 1){
	$username = $_GET['username'];
	delete_row('users','username',$username);
	header("Location: admin_control.php");
}
?>
