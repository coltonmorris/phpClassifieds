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
		$username = $_POST['username'];
		$password = md5($_POST['password'].$_POST['username']);
		$passconfirm = md5($_POST['confirm'].$_POST['username']);
		$email = $_POST['email'];
		$allowed_domain = array('dmail.dixie.edu');
		$RoleID = 0;
		if ($password != $passconfirm){
			echo "Passwords do not match!";
			break;
		}
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
			exit;
		}
		else {
			echo "Not a valid email, please use your dmail!";
		}
}
?>
</div>
<?php include_once('foot.php');?>
