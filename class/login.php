<?php
include_once('head.php');
if(isset($_POST['login'])){
	//set RoleID  1=admin 
	//login starts a session
	login($_POST['username'],$_POST['password']);
}
?>

<!-- login form -->
<div id="middlecolumn">
<form action="login.php" method="POST">
	<p>
		Username:<input type="text" name="username"><br/>
		Password:<input type="password" name="password"><br/>
		<input type="submit" value="login" name="login">
	</p>
</form>
<!-- logout form -->
<form action="logout.php" method="POST">
	<p>
		<input type="submit" value="logout" name="logout">
	</p>
</form>
 
<!-- create form -->
<form action="create_user.php" method="POST">
	<p>
		<input type="submit" value="Create Account" name="create_user">
	</p>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php'); ?>
