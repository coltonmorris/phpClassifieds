    <div id="footerwrapper">
    	<div class="columnb">
        	<ul>
            	<li><a href="index.php">Home</a></li>
                <li><a href="listings.php">Listings</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="columnb">
        	<div class="logged">
			<?php 
			if (isset($_SESSION['username'])){
			echo $_SESSION['username'] ." you are logged in<br>";
			echo $_SESSION['RoleID'] ." is your role id!!";
			}
			else {
				echo "Please login";
			}
			?>
            </div>
        </div>
    
    </div><!--close foot wrapper-->
</div><!--closes wrapper-->
</body>
</html>
