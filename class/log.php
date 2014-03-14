<?php include_once('head.php') ?>
<div id="middlecolumn">
<p>
<?php
if(isset($_POST['login'])){
	//set RoleID  1=admin 
	//login starts a session
	echo login($_POST['username'],$_POST['password']);
}
?>
</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
