<?php include_once('head.php') ?>
<div class="content">
		<script> //this script disallows adding extra characters to a text field or number field. It is modular.
			function limit(element, maxchars) {
				maxchars -= 1;
				el = element.value; //set the value to manipulate
				flip = false; //check to see if we had to flip int to string
				if (typeof el == "number") //see if el is a number
					{
						el = el.tostring().substr(0,maxchars);//convert and splice el	
						flip = true;//set flip to skip string handlers
					}
				if (element.value.length > maxchars) //see if the incoming value is greater than maxcharacters
					if (!flip){ //if it was a number, skip this section
						el = el.substr(0,maxchars); //oh kill em
						element.value = el; //return el
					}
					else {
						element.value = Number(el); //return el as a number
					}
			}
		</script>
<form action="postedinfo.php" method="POST" enctype="multipart/form-data">
	<div>
		<label for="subject">*Subject:</label> 
        <input type="text" required name="subject" maxlength="68" onKeyDown="limit(this, 68);" on onKeyUp="limit(this, 68);"><br><br>
		<label for="description">*Description: </label>
        <textarea name="description" required cols="60" rows="5"></textarea><br><br>
		<label for="cost">*Cost: </label>
        <input type="number" min="0" max="99999" required name="cost" onKeyDown="limit(this, 5);" onKeyUp="limit(this, 68);"><br><br>
        <script type="text/javascript">
			$(document).ready(function() {
				//alert('Document is ready');
                $('#cSelect').change(function() {
                    var sel = $(this).val();
					//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "subcat.php", // "another_php_file.php",
                        data: 'selected=' + sel,
                        success: function(data) {
						//alert('Server-side response: ' + data);
                            $('#subcats').html(data);
                        }
                    });
                });
            });
		</script>
		<label for="catagory">*Category:</label>
        <select name ="catagory" required id="cSelect" class="catsize">
				<!-- this list will be pulled from the database -->
             <option></option>
			 <?php 
				$query = "select name from catagories";
				$results = do_query($query);
				while ($row = mysqli_fetch_row($results)){
					echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
					} 
				?>
		</select><br><br>
		<label for="subcatagory">*Subcategory:</label>
        <select name ="subcatagory" required id="subcats" class="catsize">
		</select><br><br>
		<label for="images">Images: </label>
        <input type="file" name="images[]" id="images" accept="image/*" multiple><br><br>
		<input type="submit" name="submit" value="Post Ad">
	</div>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>

