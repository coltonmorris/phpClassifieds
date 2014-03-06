<?php include_once('head.php') ?>
<div id="middlecolumn">
<form action="postedinfo.php" method="POST">
	<p>
		Subject: <input type="text" name="Subject"><br/>
		Description: <textarea name="Description" cols="65" rows="10"></textarea>
		Cost: <input type="text" name="Cost"><br/>
		Category:<select name ="Category">
				<!-- this list will be pulled from the database -->
				 <?php $category = array("Electronic","Vehicles","Textbooks","Recreation","Rides");
				foreach($category as $cat) {
					//creates options for select box with proper format
					echo "$cat".": <option value='"."$cat"."'>"."$cat</option>";
					} ?>
			</select><br/>
		<input type="submit" name="submit" value="Post Ad">
	</p>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>
