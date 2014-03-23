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
//while ($row = mysqli_fetch_assoc($results)){
//	$imageTableName = "image_$count";
//	echo $imageTableName;
//	foreach ($row as $k =>$val){
//		echo $k. ' ';
//		if ($k == $imageTableName){
//			//echo "<img src = $val>";
//		}
//	}
//	count ++;
//}
echo "hello world";
?>
</div>

<?php include_once('foot.php'); ?>

