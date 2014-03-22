<?php include_once('head.php');?>
<div id="listings">
<?php 
echo "<PRE>";
print_r($_GET);
echo "</PRE>";
$catagory = $_GET['catagory'];
$query = "select * from listings where catagory='$catagory'";
$results = do_query($query);
show_table($results);
?>
</div>

<?php include_once('foot.php'); ?>
