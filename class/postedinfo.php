<?php include_once('head.php') ?>
<div id="middlecolumn">
	Thank you for posting an ad!

<?php
//content with quotes buggs table
$catagory = $_POST['catagory'];
$subcatagory = $_POST['subcatagory'];
$username = $_SESSION['username'];
$subject = $_POST['subject'];
$description =$_POST['description'];
$cost = "$".$_POST['cost'];
//images needs work and research :D
//planning on the base image being their username+id+index
//for example: images/colton0201 through images/colton0204
//if image count was 4.
$image_count = 1;
$base_image = $_POST['images'];
print_r($_FILES);
print_r($_FILES['images']);
if(count($_FILES['images']['name'])) {
	foreach ($_FILES['images']['name'] as $file) {
		//do your upload stuff here
		echo "hello world";
		echo $file;
		
	}
}
else {
	echo "didn't work";
}






$query = "insert into listings (catagory, subcatagory,username,
					subject,description,cost,image_count,base_image) values (
					'$catagory','$subcatagory','$username','$subject','$description',
					'$cost',$image_count,'$base_image')";
$results = do_query($query);
?>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
