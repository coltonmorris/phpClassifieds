<?php include_once('head.php'); 

$query = "select * from listings";
$results = do_query($query);
show_table($results);

include_once('foot.php'); ?>
