<?php include_once('head.php');?>
<div id="listings">
<?php 
$query = "select * from listings";
$results = do_query($query);
show_table($results);
?>
</div>

<?php include_once('foot.php'); ?>
