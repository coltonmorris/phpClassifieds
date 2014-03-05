<?php include_once('head.php'); ?>
<div id="middlecolumn">
<p>
<?php
	echo 'Date:   '. date("F j, Y"); 
	$query = 'SELECT * from Roles;';
	$results = do_query($query);
	show_table($results);
?>
</p>
</div> <!-- end middlecolumn -->

<?php include_once('foot.php') ?>
