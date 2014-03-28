<?php include_once('head.php');?>
<? 
search_function();
if (isset($_GET['submit'])){
	echo "search function";
}
else{
	echo "not search function";
}
//
//$query = "select * from listings";
//$results = do_query($query);
//show_listings($results);
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
