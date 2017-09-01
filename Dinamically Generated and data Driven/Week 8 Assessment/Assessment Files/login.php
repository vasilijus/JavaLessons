<?php
require ('config.inc.php'); 
$page_title = 'Login Page';

//1 - include the header file

//2 -

		if ($e && $p) { 

		
		$q = "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (@mysqli_num_rows($r) == 1) { 

			
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
			mysqli_free_result($r);
			mysqli_close($dbc);
							
			
			$url = BASE_URL . 'index.php'; 
			ob_end_clean(); 
			header("Location: $url");
			exit(); 
				
		} else { 
			echo '<p class="error"><b>Either the email address and password entered is invalid, please try again.</b></p>';
		}
		
	} else { 
		echo '<p class="error">Please try again.</p>';
	}
	
	mysqli_close($dbc);

} 

?>

<h1>Login</h1>
<p>We may use information obtained about you from cookies  which we can access when you visit our website in future. We do this to allow us to identify users and personalise the website wherever possible. The cookies store small pieces of information about our visitors. This means that on future visits to our websites, we can identify past visitors and welcome them back.</p>
<form action="login.php" method="post">
	<fieldset>
	<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="60" /></p>
	<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>
	<div align="center"><input type="submit" name="submit" value="Login" /></div>
	</fieldset>
</form>

<?php 

//3 - include the footer file 

?>