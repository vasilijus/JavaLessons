<?php
require ('config.inc.php'); 
$page_title = 'Changing Your Password';

//1 - include the header file
include('header.html');
//2 - 
if (!isset($_SESSION['user_id'])) {
	$url = BASE_URL . 'login.php'; //BASE_URL is defined in the config.inc.php
    ob_end_clean();
    header("Location: $url");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);
			
	
	$p = FALSE;
	if (preg_match ('/^(\w){4,20}$/', $_POST['password1']) ) {
		if ($_POST['password1'] == $_POST['password2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['password1']); //Password Validation
		} else {
			echo '<p class="error"><b>Your password did not match the confirmed password!</b></p>';
		}
	} else {
		echo '<p class="error"><b>Please enter a valid password!</b></p>';
	}
	
	if ($p) { 

		
		$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id={$_SESSION['user_id']} LIMIT 1";	
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		if (mysqli_affected_rows($dbc) == 1) { //Updating MYSQL Database

			
			echo '<h3><b>Your password has been changed.</b></h3>';
			mysqli_close($dbc); 
			include ('footer.html'); 
			exit();
			
		} else { 
		
			echo '<p class="error"><b>Your password was not changed. Make sure your new password is different than the current password. Contact the system administrator if you think an error occurred.</b></p>'; 

		}

	} else { 
		echo '<p class="error"><b>Inavlid password. Please try again.</b></p>';		
	}
	
	mysqli_close($dbc); 

} 
	
?>

<h1>Changing Your Password</h1>
<form action="change_password.php" method="post">
	<fieldset>
	<p><b>Enter New Password:</b> <input type="password" name="password1" size="20" maxlength="20" /> <small>Use only letters, numbers, and the underscore. Must be between 4 and 20 characters long.</small></p>
	<p><b>Confirm New Password:</b> <input type="password" name="password2" size="20" maxlength="20" /></p>
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Change My Password" /></div>
</form>

<?php 

//3 -  include the footer file 
include('footer.html');
?>