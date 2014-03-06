<?php include_once('head.php'); 

$query = "select * from jobs";
$results = do_query($query);
show_table($results);

include_once('foot.php'); ?>
