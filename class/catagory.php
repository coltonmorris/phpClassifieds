<?php include_once('head.php');?>
<?php search_function();?>
<div id="listings">
<?php 
$catagory = $_GET['catagory'];
$query = "select * from listings where catagory='$catagory'";
$results = do_query($query);
show_table($results);
?>
</div>

<?php include_once('foot.php'); ?>
