<?php include_once('head.php')?>
<div id="middlecolumn">
<p>
	CREATE ACCOUNT:
<form method="POST" action="<?$_SERVER['PHP_SELF']?>">
		Username:<input type="text" name="username"><br/>
		Password:<input type="text" name="password"><br/>
		Email:<input type="text" name="email"><br/>
		Role:
		<!-- dropdown: name = 'Roles'-->
		<?php echo display_dropdown('Roles'); ?><br/>
		<input type="submit" value="Create Account" name="new_user">
</form> 
</p>
<?php
if (isset($_POST['new_user'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$RoleID = $_POST['Roles'];
		echo add_user($username,$password,$email,$RoleID);
}
?>
</p>
</div>
<?php include_once('foot.php');?>
