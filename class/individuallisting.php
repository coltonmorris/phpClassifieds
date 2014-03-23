<?php include_once('head.php');?>
<div>
<?php 
$id = $_GET['id'];
$query = "select * from listings where id='$id'";
$results = do_query($query);
show_table($results);
$query = "select * from listings where id='$id'";
$results = do_query($query);
$count = 0;
//this code is ugly, and IDGAF, i'm the only one who reads it.
//It is how to access the images,though.
while ($row = mysqli_fetch_assoc($results)){
	foreach ($row as $k =>$val){
		if ($k == 'image_0'){
			echo "<img src = $val>";
		}
		else if ($k == 'image_1'){
			echo "<img src = $val>";
		}
		else if ($k == 'image_2'){
			echo "<img src = $val>";
		}
		else if ($k == 'image_3'){
			echo "<img src = $val>";
		}
	}
}
?>
</div>

<?php include_once('foot.php'); ?>

