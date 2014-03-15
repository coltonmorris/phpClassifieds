<?php
$parent = $_POST['selected'];
$query = "select name from subcatagories where parent='$parent'";
$results = do_query($query);
while ($row = mysqli_fetch_row($results)){
	echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
	} 
?>