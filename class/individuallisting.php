<?php include_once('head.php');?>
<script type="text/javascript">
	Shadowbox.init();
</script>
<div class="icontent">
<?php 
//save all the values so they can be written in any order
$id = $_GET['id'];
$query = "select * from listings where id='$id'";
$results = do_query($query);
while ($row = mysqli_fetch_assoc($results)){
	foreach ($row as $k =>$val){
		if ($k == 'subject'){
			$subject = $val;
		}
		else if ($k == 'date'){
			$date = $val;
		}
		else if ($k == 'cost'){
			$cost = $val;
		}
		else if ($k == 'description'){
			$description = $val;
		}
		else if ($k == 'username'){
			$username = $val;
		}
		else if ($k == 'email'){
			$email = $val;
		}
		else if ($k == 'image_count'){
			$image_count = $val;
		}
		else if ($k == 'image_0'){
			$image_0 = $val;
		}
		else if ($k == 'image_1'){
			$image_1 = $val;
		}
		else if ($k == 'image_2'){
			$image_2 = $val;
		}
		else if ($k == 'image_3'){
			$image_3 = $val;
		}
	}
}

echo "<div class='iSubject'>";
	echo "$subject";
echo "</div>";
echo "<div class='iDate'>";
	echo timestamp_to_date($date);
echo "</div>";
echo "<div class='iCost'>";
	echo "$cost";
echo "</div>";
//loop through images, if it is empty, don't do anything
if($image_count != 0){
	echo "<div class='iSlider'>";
	echo '<ul>';
	$images = array($image_0,$image_1,$image_2,$image_3);
	foreach($images as $image=>$val){
		if ($image_count > 0){
		echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
		}
		$image_count --;
	}
	echo '</ul>';
	echo '</div>';
}
echo "<div class='iDescription'>";
	echo $description;
echo "</div>";
echo "<div class='iContact'>";
	echo $email;
echo "</div>";

?>
</div>

<?php include_once('foot.php'); ?>

<!-- this is the template for individual listings
	<div class="iSubject">
    	OMG sell books!
    </div>
    <div class="iDate">
    	Posted on: December 31
    </div>
    <div class="iCost">
    	$350
    </div>
    <div class="iSlider">
    	<ul>
    	<li><a href="images/55colton0.png" rel="shadowbox[i]"><img src="images/55colton0.png"></a></li>
        <li><a href="images/55colton1.png" rel="shadowbox[i]"><img src="images/55colton1.png"></a></li>
        <li><a href="images/55colton2.png" rel="shadowbox[i]"><img src="images/55colton2.png"></a></li>
        <li><a href="images/55colton3.png" rel="shadowbox[i]"><img src="images/55colton3.png"></a></li>
        </ul>
    </div>
    <div class="iDescription">
    	Big words scare me!
    </div>
    <div class="iContact">
    	four three five
    </div>
		-->
