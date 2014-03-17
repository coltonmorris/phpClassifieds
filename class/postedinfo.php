<?php include_once('head.php') ?>
<div id="middlecolumn">
	Thank you for posting an ad!

<?php
$catagory = $_POST['catagory'];
$subcatagory = $_POST['subcatagory'];
$username = $_SESSION['username'];
$subject = $_POST['subject'];
$description =$_POST['description'];
$cost = "$".$_POST['cost'];

//insert into database, wait for listing id to insert the files name
$query = "insert into listings (catagory, subcatagory,username,
					subject,description,cost) values (
					'$catagory','$subcatagory','$username','$subject','$description',
					'$cost')";
$results = do_query($query);
$query = "select id from listings where username='$username' and description='$description'";
$results = do_query($query);
$row = mysqli_fetch_row($results);
$id = $row[0];

echo $id;

//planning on the base image being their username + listing id + index
//for example: images/colton0201 through images/colton0204
//if image count was 4.
$image_count = count($_FILES['images']['name']);
$base_image = $_POST['images'];
for($i=0;$_FILES["images"]["name"][$i]==true;$i++) {
	$fileName = $_FILES["images"]["name"][$i]; // The file name
	$fileTmpLoc = $_FILES["images"]["tmp_name"][$i]; // File in the PHP tmp folder
	$fileType = $_FILES["images"]["image/png||image/jpg"][$i];  // The type of file it is
	$fileSize = $_FILES["images"]["size"][$i]; // File size in bytes
	$fileErrorMsg = $_FILES["images"]["error"][$i]; // 0 = false | 1 = true
	$kaboom = explode(".",$_FILES["images"]["name"][$i]); // Split file name into an array using the dot
	$fileExt = end($kaboom); // Now target the last array element to get the file extension

	//$newfileName = $username . 
	//$moveResult= move_uploaded_file($fileTmpLoc, "images/$fileName");
	unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
}
echo $image_count;


?>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
