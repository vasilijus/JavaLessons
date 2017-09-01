<?php 
require ('config.inc.php'); 
$page_title = 'Forgotten Your Password';

//1 -  include the header file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);

	
	$uid = FALSE;

	
	if (!empty($_POST['email'])) {

		
		$q = 'SELECT user_id FROM users WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 1) { 
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { 
			echo '<p class="error">The submitted email address does not match a registered user!</p>';
		}
		
	} else { 
		echo '<p class="error">You forgot to enter your email address!</p>';
	} 
	
	if ($uid) { 

		
		$p = substr ( md5(uniqid(rand(), true)), 3, 10);

		
		$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($dbc) == 1) { 
		
			
			$body = "Your password to log into <whatever site> has been temporarily changed to '$p'. Please log in using this password and this email address. Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: myemail@domain.com');
			
			
			echo '<h3>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</h3>';
			mysqli_close($dbc);
			include ('footer.html');
			exit(); 
			
		} else { 
			echo '<p class="error">Your password could not be changed due to a system error. We apologise for any inconvenience.</p>'; 
		}

	} else { 
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

} 
?>

<h1>Resetting Your Password</h1>
<p>Enter your email address below and your password will be reset.</p> 
<form action="forgot_password.php" method="post">
	<fieldset>
	<p><b>Enter Email Address:</b> <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Reset My Password" /></div>
</form>

<?php 

//2 -  include the footer file 

?>