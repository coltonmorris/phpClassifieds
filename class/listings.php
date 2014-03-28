<?php include_once('head.php');?>
<div id="middlecolumn">
Search
<form action="<?$_SERVER['PHP_SELF']?>" method="POST">
		<label for="subject">Keyword:</label> 
        <input type="text" name="keyword" maxlength="68"><br><br>
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

</form>
</div>

<?php
$query = "select id,date,subject,cost,image_count from listings";
$results = do_query($query);
show_listings($results);
?>
<!--
   <div class="lItem">
    	<div class="lDate">
        	<p>
        		November 28
            </p>
        </div>
        <div class="lSubject">
        	<a href="Link to the listing">Humanities 3400 text book for sale</a>
        </div>
        <div class="lCost">
        	$8000
        </div>
        <div class="lPicture">
        	<img src="camera.png"> 
        </div>
    </div>
</div> -->

<?php include_once('foot.php'); ?>
