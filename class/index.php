<?php include_once('head.php'); ?>
<div id="container">
	<div id="banner-fade">
    	<ul class="bjqs">
        	<li><img src="http://images.universityherald.com/data/images/full/4147/dixie-state-university.jpg?w=600" title="DSU"></li>
            <li><img src="http://dixie.edu/commencement/Image/DSC_Grad261.jpg" title="Graduates"></li>
            <li><img src="http://mediad.publicbroadcasting.net/p/kuer/files/201302/UT-Capitol-Stock-06.jpg" title="Capitol"></li>
        </ul>
    </div>
</div>
<script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : $('#container').height(),
            width       : $('#container').width(),
            responsive  : true
          });

        });
</script>
<div class="content">
<!-- open column div. open listhead div. catagory is in listheads.
		close listhead. open subcats ul. each subcatagory is in <li></li>
		close ul. close column.
-->
<?php 
$query = "select name from catagories";
$results = do_query($query);
show_catagories($results);
function show_catagories($results) {
	while ($row = mysqli_fetch_row($results)){
		echo $row[0];
	}
}
//		echo "<div class='column'>";
//			echo "<div class='listheads'>";
//				echo $
?>
	<div class="column">
				<div class="listheads">
						Electronics
				</div><!--close a listhead-->
						<ul class="subcats">
							<li>Phones</li>
							<li>Tablets</li>
							<li>Computers and stuff</li>
						</ul>
	</div><!--close the column-->
				<div class="column">
					<div class="listheads">
						Appliances
						</div>
						<ul class="subcats">
							<li>Whacky waving inflatable arm flailing tube men</li>
								<li>flashlights</li>
								<li>blenders</li>
						</ul>
				</div>
				<div class="column">
					<div class="listheads">
							Vehicles
						</div>
						<ul class="subcats">
							<li>Infiniti Master race</li>
								<li>Inferior suburu</li>
								<li>American <del>toys</del> cars</li>
						</ul>
				</div>
				<br id="clear">
</div>

<?php include_once('foot.php'); ?>

