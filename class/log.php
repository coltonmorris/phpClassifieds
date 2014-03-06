<?php include_once('head.php') ?>
<div id="middlecolumn">
<p>
<?php
if(isset($_POST['login'])){
	//set RoleID  1=admin 2=employer 3=employee
	//echo login($_POST['username'],$_POST['password']);
	echo login($_POST['username'],$_POST['password']);
}
?>
</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
