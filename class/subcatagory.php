<?php include_once('head.php');?>
<div id="listings">
<?php 
$subcatagory = $_GET['subcatagory'];
$query = "select * from listings where subcatagory='$subcatagory'";
$results = do_query($query);
show_table($results);
?>
</div>

<?php include_once('foot.php'); ?>
