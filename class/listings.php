<?php 
include_once('head.php');

$query = "select id,date,subject,cost,image_count from listings";
$results = do_query($query);
show_listings($results);
?>
   <div class="lItem">
    	<div class="lDate">
        	<p>
        		November 28
            </p>
        </div>
        <div class="lSubject">
        	<a href="Link to the listing"><!--this will be listing.subject text-->Humanities 3400 text book for sale</a>
        </div>
        <div class="lCost">
        	$8000
        </div>
        <div class="lPicture">
        	<img src="camera.png"> <!--Only diplays if listing has a picture-->
        </div>
    </div>
</div> 

<?php include_once('foot.php'); ?>
