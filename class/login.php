<?php
if(isset($_POST['login'])){
	//set RoleID  1=admin 
	//login starts a session
	include_once('db_functions.php');
	login($_POST['username'],md5($_POST['password']));
	if ($_SESSION['badlogin'] == false){
		header('Location: http://www.ataxicdesign.com/phpClassifieds/class/index.php');
		exit();
	}
}
include_once('head.php');
if ($_SESSION['badlogin'] == true){
	echo "Your username or password was incorrect";
}

?>

<!-- login form -->
<div id="content">
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		Username: <input type="text" name="username"><br><br>
		Password: <input type="password" name="password"><br><br>
		<input type="submit" value="login" name="login">
</form>
<!-- logout form -->
<form action="logout.php" method="POST">
		<input type="submit" value="logout" name="logout">
</form>
 
<!-- create form -->
<form action="create_user.php" method="POST">
		<input type="submit" value="Create Account" name="create_user">
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php'); ?>
