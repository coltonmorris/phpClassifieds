<?php include_once('head.php');?>
<div>
<?php 
$id = $_GET['id'];
$query = "select * from listings where id='$id'";
$results = do_query($query);
show_table($results);
?>
</div>

<?php include_once('foot.php'); ?>

