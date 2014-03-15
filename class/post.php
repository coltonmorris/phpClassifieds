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
        <script type="text/javascript">
			$(document).ready(function() {
				alert('Document is ready');
                $('#cSelect').change(function() {
                    var sel = $(this).val();
					//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "subcat.php", // "another_php_file.php",
                        data: 'selected=' + sel,
                        success: function(data) {
						alert('Server-side response: ' + data);
                            $('#subcats').html(data);
                        }
                    });
                });
            });
		</script>
		<label for="catagory">*Category:</label>
        <select name ="catagory" required id="cSelect">
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
        <select name ="subcatagory" required id="subcats">
			 	<!--//parent='blank' should be the currently selected option in the catagory select field
				
				//we need a for loop that grabs every single subcategory and puts them in there
				//Make sure that there is a <optgroup> that wraps sub cats, ie
				//	<optgroup name=
                -->
		</select><br><br>
		<label for="images">Images: </label>
        <input type="file" name="images" accept="image/*"><br><br>
		<input type="submit" name="submit" value="Post Ad">
	</div>
</form>
</div> <!-- end middlecolumn -->
<?php include_once('foot.php') ?>


			<!--
            found this on ksl.com/auto/ since they have something similar
            	$('#searchFormMake').change(function() {
					//s.linkTrackVars='events';
					//s.linkTrackEvents='event42';
					s.events = 'event42';
					s.eVar32 = $('#searchFormMake').val();
					s.eVar41 = 'Make';
					//s.tl(this,'o','Make');
					//s.manageVars('clearVars', s.linkTrackVars,1);

					o_cars_facets['Make'] = $('#searchFormMake').val();
					o_list_of_facets.splice('Make');

					var tempModels = $('#searchFormModel').val();
					$.ajax({
						url: '/auto/search/models-for-makes/format/json',
						type: 'POST',
						data: { 'make': $('#searchFormMake').val() },
						dataType: 'json',
						success: function(modelArray)
						{
							var previousModelsSelected = new Array();
							if (tempModels)
							{
								/*
								Make sure we are getting an array (as a regular select
								[which we switched to multiple] gives back a string)
								*/
								if (tempModels instanceof Array)
								{
									previousModelsSelected = tempModels;
								}
								else
								{
									previousModelsSelected = new Array(tempModels);
								}
							}

							$('#searchFormModel').empty();
							$.each(modelArray, function (index) {  // model level
								var optgroup = $('<optgroup>');
								optgroup.attr('label', modelArray[index].make);

								$.each(modelArray[index].models, function (i) {
									var option = $("<option />");
									option.val(modelArray[index].models[i]);
									option.text(modelArray[index].models[i]);
									if (previousModelsSelected.length > 0 && $.inArray(modelArray[index].models[i], previousModelsSelected) > -1)
									{
										option.attr("selected", "selected");
									}
									if (modelArray[index].models[i] == 'None Available')
									{
										option.attr("disabled", "disabled");
									}
									optgroup.append(option);
								});
								$('#searchFormModel').append(optgroup);
							});
						},
						error: function(a, b) {
							$('#searchFormModel').empty();
						},
						complete: function() {
							$("#searchFormModel").multiselect("refresh");

						}
                    });
				});
                -->
