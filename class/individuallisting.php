<?php include_once('head.php');?>
<div>
<?php 
$id = $_GET['id'];
$query = "select * from listings where id='$id'";
$results = do_query($query);
show_table($results);
while ($row = mysqli_fetch_assoc($results)){
	foreach ($row as $k =>$val){
		echo $k. ' '.$val;
	}
}
?>
</div>

<?php include_once('foot.php'); ?>

