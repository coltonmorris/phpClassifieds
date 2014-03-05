<?php include_once('head.php'); ?>
<div id="middlecolumn">
<p>
<?php
//if control panel isnt set, the person is does not have access to the control panel
if (!isset($_SESSION['control_panel']) || $_SESSION['control_panel'] != 'employee_control.php'){
	header('Location: index.php');
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$field = 'resume';
$data = functional_textarea('resumes',$username,$field,'save','username');
?>
<form action="<?$_SERVER['PHP_SELF']?>" method="POST">
		Resume:<textarea name=<?=$field?> cols='60',rows='10'><?=$data?></textarea><br />
		<input type="submit" value="Save" name="save">
</form>
</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
