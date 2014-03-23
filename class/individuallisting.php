<?php include_once('head.php');?>
<div>
<?php 
$id = $_GET['id'];
$query = "select * from listings where id='$id'";
$results = do_query($query);
show_table($results);
$query = "select * from listings where id='$id'";
$results = do_query($query);
while ($row = mysqli_fetch_assoc($results)){
	foreach ($row as $k =>$val){
		echo $k. ' '.$val;
	}
}
echo "hello world";
?>
</div>

<?php include_once('foot.php'); ?>

