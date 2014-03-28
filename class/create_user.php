<?php include_once('head.php')?>
<div id="middlecolumn">
<p>
	CREATE ACCOUNT:
<form method="POST" action="<?$_SERVER['PHP_SELF']?>">
		Username:<input type="text" name="username"><br/>
		Password:<input type="text" name="password"><br/>
		Email:<input type="text" name="email"><br/>
		<input type="submit" value="Create Account" name="new_user">
</form> 
</p>
<?php
if (isset($_POST['new_user'])){
		logout();
		$username = $_POST['username'];
		$password = md5($_POST['password'].$_POST['username']);
		$email = $_POST['email'];
		$allowed_domain = array('dmail.dixie.edu');
		$RoleID = 0;
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$domain = array_pop(explode('@', $email));
			if ( ! in_array($domain, $allowed_domain))
			{
				echo "you must use your dmail!";
			}
			else
			{
				echo add_user($username,$password,$email,$RoleID);
			}
		}
}
?>
</p>
</div>
<?php include_once('foot.php');?>
