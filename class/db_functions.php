<?php
function do_query($query){
	$host = 'localhost';
	$usr = 'ataxicde_admin';
	$pass =  '@greglayton$$$';
	$db = 'ataxicde_classifieds';
	$conn = mysqli_connect($host,$usr,$pass,$db) or die ("not connected");
	$results = mysqli_query($conn,$query) or die (mysqli_error($conn));
	mysqli_close($conn);
	return $results; 
}

function timestamp_to_date($timestamp){
	return date('F d',strtotime($timestamp));
}
function search_function(){
	echo "<form action='<?$_SERVER[PHP_SELF]?>' method='GET'>";
	echo "		<label for='subject'>Keyword:</label> ";
	echo "        <input type='text' name='keyword' maxlength='68'><br><br>";
//	echo "        <script type='text/javascript'>";
//	echo "			$(document).ready(function() {";
//	echo "				//alert('Document is ready');";
//	echo "                $('#cSelect').change(function() {";
//	echo "                    var sel = $(this).val();";
//	echo "					//alert('You picked: ' + sel);";
//	echo "                    $.ajax({";
//	echo "                        type: 'POST',";
//	echo "                        url: 'subcat.php', // 'another_php_file.php',";
//	echo "                        data: 'selected=' + sel,";
//	echo "                        success: function(data) {";
//	echo "						//alert('Server-side response: ' + data);";
//	echo "                            $('#subcats').html(data);";
//	echo "                        }";
//	echo "                    });";
//	echo "                });";
//	echo "            });";
//	echo "		<//script>";
//	echo "		<label for='catagory'>Category:</label>";
//	echo "        <select name ='catagory' id='cSelect' class='catsize'>";
//	echo "             <option></option>";
//					$query = "select name from catagories";
//					$results = do_query($query);
//					while ($row = mysqli_fetch_row($results)){
//						echo "$row[0]:<option value='$row[0]'>$row[0]</option>";
//						} 
//	echo "		</select><br><br>";
//	echo "		<label for='subcatagory'>Subcategory:</label>";
//	echo "        <select name ='subcatagory' id='subcats' class='catsize'>";
//	echo "		</select><br><br>";
	echo "		<input type='submit' name='submit' value='Search'>";
	echo "</form>";

	if (isset($_GET['submit'])){
	$keyword = $_GET['keyword'];
	$query= "select id,date,subject,cost,image_count from listings where 
				(description like '%$keyword%' or subject like '%$keyword%')";
	//$catagory = $_GET['catagory'];
	//$subcatagory = $_GET['subcatagory'];
	//$query = "select id,date,subject,cost,image_count from listings where description like '%$keyword%'
	//					and catagory='$catagory' and subcatagory='$subcatagory'";
	$results = do_query($query);
	show_listings($results);
	}
	else{
	$query = "select id,date,subject,cost,image_count from listings";
	$results = do_query($query);
	show_listings($results);
	}
}

function show_catagories($results) {
	//loop through each catagory
	while ($row = mysqli_fetch_row($results)){
		echo "<div class='column'>";
			echo "<div>";
			//uses get to pass the correct catagory
			$link_name = "catagory.php?catagory=$row[0]";
				echo "<a href='$link_name' class='listheads'>$row[0]</a>"; //catagory name
			echo "</div>"; //close listhead
			echo "<ul class='subcats'>";
			//loop through each subcatagory now
			$query = "select name from subcatagories where parent = '$row[0]'";
			$subresults = do_query($query);
			while ($sub = mysqli_fetch_row($subresults)){
				//uses get to pass the correct subcatagory
				$sub_link = "subcatagory.php?subcatagory=$sub[0]&catagory=$row[0]";
				echo "<li>";
				echo "<a href='$sub_link'>$sub[0]</a>"; //subcatagory name
				echo "</li>";
			}
			echo "</ul>"; 
		echo "</div>"; //close column
	}
}
function show_listings($results) {
	echo "<div id='listings'>";
	while ($row = mysqli_fetch_assoc($results)) {
		echo "<div class='lItem'>";
			foreach ($row as $k => $val) {
			//id is populated first, so there will be no problems with the subject
				if ($k == 'id'){
					$link = "individuallisting.php?id=$val";
				}
				if ($k == 'date') {
					echo "<div class='lDate'>";
					echo "<p>";
					echo date("F d",$val);
					echo "</p>";
					echo "</div>";
				} 
				//subject is the link to the actual listing
				else if ($k == 'subject'){
					echo "<div class='lSubject'>";
					echo "<a href=$link>$val</a>";
					echo "</div>";
				}
				else if ($k == 'cost'){
					echo "<div class='lCost'>";
					echo "$val";
					echo "</div>";
				}
				else if ($k == 'image_count'){
					//camera only displays if listings has a picture
					if ($val > 0){
					echo "<div class='lPicture'>";
					echo "<img src='camera.png'>";
					echo "</div>";
					}
				}
			}
		echo "</div>";
	}
	echo "</div>";
}
function show_listings_admin($results) {
	echo "<div id='listings'>";
	while ($row = mysqli_fetch_assoc($results)) {
		echo "<div class='lItem'>";
			foreach ($row as $k => $val) {
			//id is populated first, so there will be no problems with the subject
				if ($k == 'id'){
					$link = "individuallisting.php?id=$val";
				}
				if ($k == 'date') {
					echo "<div class='lDate'>";
					echo "<p>";
					echo date("F d",$val);
					echo "</p>";
					echo "</div>";
				} 
				//subject is the link to the actual listing
				else if ($k == 'subject'){
					echo "<div class='lSubject'>";
					echo "<a href=$link>$val</a>";
					echo "</div>";
				}
			}

		echo "<td><a href=delete_job.php?id=$id>delete</a></td>";
		echo "</div>";
	}
	echo "</div>";
}
function show_user_admin($results) {
    echo "<table>";
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        foreach ($row as $k => $val) {
						if ($k == 'username'){
								$username = $val;
						}
						else if ($k == 'RoleID'){
							//find the value of their RoleID for GET
								$RoleID = $val;
						}
            else if ($k == 'email') {
                echo "<td><a href=mailto:$val>$val</a></td>";
            } 
						else {
                echo "<td>$val</td>";
            }
        }
				if ($RoleID != 1){
					//use GET to pass variables to the page
					echo "<td><a href=delete_user.php?username=$username&RoleID=$RoleID>
											delete</a></td>";
				}
        echo "</tr>";
    }
    echo "</table>";
}
function show_table($results) {
    echo "<table class='listing' border=1>";
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        foreach ($row as $k => $val) {
			//Colton - make it so that this if statement excludes everything except for the subject category and sub category
            if ($k == 'email' and $k != 'image') {
                echo "<td><a href=mailto:$val>$val</a></td>";
            } 
						//links to the individual listing
						else if ($k == 'id'){
							$link = "individuallisting.php?id=$val";
							echo "<td><a href=$link>link</a></td>"; //change the word "link" to be $subject
						}

						else {
                echo "<td>$val</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
function delete_row($table,$where_key,$where){
	$query = "delete from $table where $where_key = '$where'";
	$results = do_query($query);
	return $results;
}
function add_user($username,$password,$email,$RoleID){
	$query = "select * from users where username='$username' or email='$email'";
	$results = do_query($query);
	if (mysqli_num_rows($results) >0){
		$results = "Account already exists";
	}
	else {
			$query = "INSERT INTO users VALUES ('$username',
							'$password','$email',$RoleID)";
			do_query($query);
			$results = login($username,$password);
			$results .="Your account has been created, thank you.";
	}
	return $results;
}
function logout(){
session_destroy();
}
function login($username,$password){
	//we are only going to have an admin
	session_start();
	$query = "select RoleID from users where username='$username'
							and password='$password'";
	$results = do_query($query);
	if (mysqli_num_rows($results) >0){
		$row=mysqli_fetch_assoc($results);
		$RoleID = $row['RoleID'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['RoleID'] = $RoleID;
		$filename = "user_control.php";
		//admin
		if ($RoleID == 1){
			$filename = "admin_control.php";
		}
		$_SESSION['control_panel'] = $filename;
		$_SESSION['allow'] = true;
		$_SESSION['badlogin']=false;
	}
	else { 
		$_SESSION['badlogin']=true;
	}
}
//anything below this is for reference and not actually used
function functional_textarea_jobs($username,$field,$submit_button,$primary){
	if (isset($_POST[$submit_button])){
		$query = "select * from jobs where id = '$primary'";
		$results = do_query($query);
		$query = "select '$field' from jobs where id = '$primary'";
		while ($row=mysqli_fetch_assoc($results)) {
			foreach ($row as $k => $val){
				if ($val==$primary){
					$tmp = $_POST[$primary];
					$query = "update jobs set $field='$tmp' where id = '$primary'";
				}
			}
		}
		$results = do_query($query);
	}
	$query = "select '$field' from jobs where id='$primary'";
	$results = do_query($query);
	$row = mysqli_fetch_assoc($results);
	$data = $row[$field];
	return $data;
}
function functional_textarea($table,$username,$field){
	if (isset($_POST['save'])){
		$query = "select '$username' from $table";
		$results = do_query($query);
		$query = "insert into $table values ('$username','$_POST[data]')";
		while ($row=mysqli_fetch_assoc($results)) {
			foreach ($row as $k => $val){
				if ($val==$username){
					$tmp = $_POST[$field];
					$query = "update $table set $field='$tmp' where username = '$username'";
				}
			}
		}
		$results = do_query($query);
	}
	$query = "select $field from $table where username='$username'";
	$results = do_query($query);
	$row = mysqli_fetch_assoc($results);
	$data = $row[$field];
	return $data;
}
function display_textarea($name,$data){
	$field = $name;
	$field .= '_save';
	$html = "<form action='$_SERVER[PHP_SELF]' method='POST'>";
	$html .= "$name<textarea name=$name cols='60',rows='10'>$data</textarea><br />";
	$html .= "<input type='submit' value='save' name=$field></form>";
	return $html;
}

function display_dropdown($table){
	$query = "SELECT * FROM $table;";
	$results = do_query($query);
	$html = "<select name=$table>";
	while($row=mysqli_fetch_assoc($results)){
		//modulate this by looping through array instead of assoc
		$roleDescription = $row['roleDescription'];
		$RoleID = $row['RoleID'];
		$html .= "<option value=$RoleID>$roleDescription</option>";
	}
	$html .= "</select>";
	return $html;
}
?>
