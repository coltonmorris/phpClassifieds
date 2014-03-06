<?php include_once('head.php'); ?>
<div id="middlecolumn">
<p>
<?php
//if control panel isnt set, the person is does not have access to the control panel
if (!isset($_SESSION['control_panel']) || $_SESSION['control_panel'] != 'employer_control.php'){
	header('Location: index.php');
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
//select * from jobs where username = $username;
// loop through results and display a textarea for each one
$query = "select * from jobs where username = '$username'";
$results = do_query($query);
$field = 'description';
while ($row=mysqli_fetch_assoc($results)){
	foreach ($row as $k=>$val){
		//$data = functional_textarea('jobs',$username,$field);
		if ($k == 'id'){
			$name = $val;
		}
		elseif ($k == 'description'){
			$data = $val;
			$submit_button = $name . '_save';
			echo display_textarea($name,$data);
			$data = functional_textarea_jobs($username,$field,$submit_button,$name);
			echo "<p><a href=delete_job.php?id=$name>delete</a></p>";
		}
	}
}
?>

</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
