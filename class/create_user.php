<?php include_once('head.php')?>
<div class="content">
	CREATE ACCOUNT:
<form method="POST" action="<?$_SERVER['PHP_SELF']?>">
		Username: <input type="text" required name="username"><br/>
		Password: <input type="password" required name="password"><br/>
        Confirm Password: <input type="password" required name="confirm"><br />
		Email: <input type="text" required name="email"> *use your dmail<br/>
		<input type="submit" value="Create Account" name="new_user">
</form> 
<?php
if (isset($_POST['new_user'])){
		logout();
		$username = mysql_escape_string($_POST['username']);
		$password = mysql_escape_string(md5($_POST['password'].$_POST['username']));
		$passconfirm = mysql_escape_string(md5($_POST['confirm'].$_POST['username']));
		$email = mysql_escape_string($_POST['email']);
		$allowed_domain = array('dmail.dixie.edu');
		$RoleID = 0;
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$domain = array_pop(explode('@', $email));
			if ( ! in_array($domain, $allowed_domain))
			{
				echo "you must use your dmail!";
			}
			elseif ($password != $passconfirm){
				echo "Passwords do not match!";
			}
			else
			{
				echo add_user($username,$password,$email,$RoleID);
			}
		}
		else {
			echo "Not a valid email, please use your dmail!";
		}
}
?>
</div>
<?php include_once('foot.php');?>
