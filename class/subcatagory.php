<?php include_once('head.php');?>
<?php search_function();?>
<div id="listings">
<?php 
$subcatagory = $_GET['subcatagory'];
$catagory = 	 $_GET['catagory'];
$query = "select * from listings where subcatagory='$subcatagory' and catagory='$catagory'";
$results = do_query($query);
show_listings($results);
?>
</div>

<?php include_once('foot.php'); ?>
