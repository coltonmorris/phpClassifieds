<?php include_once('head.php');?>
<script type="text/javascript">
	Shadowbox.init();
</script>
<div class="icontent">
<!--
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
<?php 
$id = $_GET['id'];
//prepare the subject, date, and cost
//$query = "select subject,date,cost,description,username from listings where id='$id'";
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
echo "$date";
echo "</div>";
echo "<div class='iCost'>";
echo "$cost";
echo "</div>";
echo "<div class='iSlider'>";
echo '<ul>';
$images = array($image_0,$image_1,$image_2,$image_3);
foreach($images as $image=>$val){
	if ($image_count < 0){
	//echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
	//echo "<img src='$val'>";
	echo "worked.";
	}
	else{
		echo "failed, $image, $val. ";
	}
	$image_count --;
}
echo '</ul>';
echo "<div class='iDescription'>";
echo $description;
echo "</div>";
echo "<div class='iContact'>";
echo "801-505-66666666";
echo "</div>";


//prepare the slider
//get the amount of images
//$query = "select image_count from listings where id='$id'";
//$results = do_query($query);
//$row = mysqli_fetch_assoc($results);
//$count = $row[0];
//$query = "select * from listings where id='$id'";
//$results = do_query($query);
//while ($row = mysqli_fetch_assoc($results)){
//	foreach ($row as $k =>$val){
//		if ($k == 'image_0'&& $count > 0){
//			echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
//		}
//		else if ($k == 'image_1'&& $count > 0){
//			echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
//		}
//		else if ($k == 'image_2'&& $count > 0){
//			echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
//		}
//		else if ($k == 'image_3'&& $count > 0){
//			echo "<li><a href='$val' rel='shadowbox[i]'><img src ='$val'></a></li>";
//		}
//		count;
//	}
//}
//echo "</ul>";
//echo "</div>";
//echo "<div class='iDescription'>";
//echo $description;
//echo "</div>";
//echo "<div class='iContact'>";
//echo "four three five";
//echo "</div>";
?>
</div>

<?php include_once('foot.php'); ?>

