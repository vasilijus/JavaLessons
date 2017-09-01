<?php 
require ('config.inc.php');
$page_title = 'Register';
include ('header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

	
	require (MYSQL);
	
	
	$trimmed = array_map('trim', $_POST);

	
	$fn = $ln = $sid = $st = $e = $p = FALSE;
	
	
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
		$fn = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
	} else {
		echo '<p class="error">Please enter your first name!</p>';
	}

	
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
		$ln = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
	} else {
		echo '<p class="error">Please enter your last name!</p>';
	}
	
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}

	
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	if ($fn && $ln && $e && $p) { 

		
		$q = "SELECT user_id FROM users WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 0) { 

			
			$a = md5(uniqid(rand(), true));

			
			$q = "INSERT INTO users (email, pass, first_name, last_name, active, registration_date) VALUES ('$e', SHA1('$p'), '$fn', '$ln', '$a', NOW() )";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { 

				
				$body = "Thank you for registering at www.stwinweb.com. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: myemail@domain.com');
				
				
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account. Or click the link below:<br /><a href="'.BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a".'">click here</a></h3>';
				include ('footer.html'); 
				exit(); 
				
			} else { 
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} else { 
			echo '<p class="error"><b>That email address has already been registered. If you have forgotten your password, use the link below to have your password sent to you.</b></p>';
		}
		
	} else { 
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

} 
?>
	
<h1>Register</h1>
<form action="register.php" method="post">
	<fieldset>
	<table>
    <tr>
	<td>First Name:</td><td><input type="text" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></td>
	</tr>
    <tr>
	<td>Last Name:</td><td><input type="text" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></td>
	</tr>
    <tr>
	<td>Email Address:</td><td><input type="text" name="email" size="30" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" /></td>
	</tr>
    <tr>
	<td>Password:</td><td><input type="password" name="password1" size="20" maxlength="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" /></td><td><small>Use only letters, numbers, and the underscore. Must be between 4 and 20 characters long.</small></td>
	</tr>
    <tr>
	<td>Confirm Password:</td><td><input type="password" name="password2" size="20" maxlength="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" /></td>
    </tr>
    </table>
	</fieldset>
	
	<div align="center"><input type="submit" name="submit" value="Register" /></div>

</form>

<?php include ('footer.html'); ?>