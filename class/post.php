<?php include_once('head.php') ?>
<div id="middlecolumn">
<form action="postedinfo.php" method="POST">
	<div>
		<label for="subject">*Subject:</label> 
        <input type="text" required name="subject"><br><br>
		<label for="description">*Description: </label>
        <textarea name="description" required cols="60" rows="5"></textarea><br><br>
		<label for="cost">*Cost: </label>
        <input type="text" required name="cost"><br><br>
        <script>
			function giveparent(id) {
				var parent = document.getElementById(id);	
			}
		</script>
		<label for="catagory">*Category:</label>
        <select name ="catagory" required onChange='giveparent("catagory")'>
				<!-- this list will be pulled from the database -->
			 <?php 
				$query = "select name from catagories";
				$results = do_query($query);
				while ($row = mysqli_fetch_row($results)){
					echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
					} 
				?>
		</select><br><br>
		<label for="subcatagory">*Subcategory:</label>
        <select name ="subcatagory" required>
			 <?php 
			 	//parent='blank' should be the currently selected option in the catagory select field
				$parent = getElementByID('catagory');
				$query = "select name from subcatagories where parent='$parent'";
				$results = do_query($query);
				while ($row = mysqli_fetch_row($results)){
					echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
					} 
				?>
		</select><br><br>
		<label for="images">Images: </label>
        <input type="file" name="images" accept="image/*"><br><br>
		<input type="submit" name="submit" value="Post Ad">
	</div>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
