<?php
include_once('db_functions.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	delete_row('listings','id',$id);
	header("Location: admin_control.php");
}
?>
