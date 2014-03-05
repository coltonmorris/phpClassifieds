<?php
function do_query($query){
	$host = 'mysql.cs.dixie.edu';
	$usr = 'cmorris';
	$pass =  '2597settlers';
	$conn = mysqli_connect($host,$usr,$pass,$usr) or die ("not connected");
	$results = mysqli_query($conn,$query) or die (mysqli_error($conn));
	mysqli_close($conn);
	return $results; 
}

function show_job_admin($results) {
    echo "<table border=1>";
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        foreach ($row as $k => $val) {
						if ($k == 'id'){
								$id = $val;
						}
            if ($k == 'email') {
                echo "<td><a href=mailto:$val>$val</a></td>";
            } 
						else {
                echo "<td>$val</td>";
            }
        }
				echo "<td><a href=delete_job.php?id=$id>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
function show_user_admin($results) {
    echo "<table border=1>";
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        foreach ($row as $k => $val) {
						if ($k == 'username'){
								$username = $val;
						}
            if ($k == 'email') {
                echo "<td><a href=mailto:$val>$val</a></td>";
            } 
						else {
                echo "<td>$val</td>";
            }
        }
				echo "<td><a href=delete_user.php?username=$username>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
function show_table($results) {
    echo "<table border=1>";
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        foreach ($row as $k => $val) {
            if ($k == 'email') {
                echo "<td><a href=mailto:$val>$val</a></td>";
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
			$results .=", and your account has been created, thank you.";
	}
	return $results;
}
function login($username,$password){
	session_destroy();
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
		//admin
		if ($RoleID == 1){
			$filename = "admin_control.php";
		}
		//employer
		else if ($RoleID == 2){
			$filename = "employer_control.php";
		}
		//employee
		else{
			$filename = "employee_control.php";
		}
		$_SESSION['control_panel'] = $filename;
		$info = "$username, you are logged in";
	}
	else { 
		$info = "Wrong log in credentials";
	}
	return $info;
}
?>
