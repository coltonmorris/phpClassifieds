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
while ($row = mysqli_fetch_assoc($results)){
	$imageTableName = "image_$count";
	foreach ($row as $k =>$val){
		echo $k. ' ';
		if ($k == $imageTableName){
			echo "yay	A;LSDKFJA;LSKDFJAL;KDSFJ";
//			//echo "<img src = $val>";
//		}
	}
//	count ++;
}
?>
</div>

<?php include_once('foot.php'); ?>

