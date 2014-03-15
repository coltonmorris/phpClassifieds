<?php include_once('head.php') ?>
<div id="middlecolumn">
<form action="postedinfo.php" method="POST">
	<p>
		Subject: <input type="text" name="subject"><br/>
		Description: <textarea name="description" cols="65" rows="10"></textarea>
		Cost: <input type="text" name="cost"><br/>
		Catagory:<select name ="catagory">
				<!-- this list will be pulled from the database -->
			 <?php 
				$query = "select name from catagories";
				$results = do_query($query);
				while ($row = mysqli_fetch_row($results)){
					echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
					} 
				?>
			</select><br/>
		Subcatagory:<select name ="subcatagory">
			 <?php 
			 	//parent='blank' should be the currently selected option in the catagory select field
				$query = "select name from subcatagories where parent='Textbooks'";
				$results = do_query($query);
				while ($row = mysqli_fetch_row($results)){
					echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
					} 
				?>
			</select><br/>
		Images: <input type="file" name="images" accept="image/*"><br/>
		<input type="submit" name="submit" value="Post Ad">
	</p>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
