<?php include_once('head.php'); ?>
<div id="middlecolumn">
<p>
<?php 
$query = "select * from jobs";
$results = do_query($query);
show_table($results);
?>
</p>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php'); ?>
