<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contact Us Form</title>
</head>
<body>
<?php

  //Create an IF Statement that uses the POST REQUEST_METHOD to retrieve information from the table
  //Add a second IF statement that will check if all three form elements are empty (!empty). Remember the and operator - &&
if($_SERVER ['REQUEST_METHOD'] == 'POST') {
	if(!empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email']) ){
		$body = "name: {$_POST['name']}\n\nComments: {$_POST['comments']}";
		$body = wordwrap($body, 70);
		$to = 'vasiliokas@gmail.com';
		mail($to, 'Add a Default Subject', $body, "From: {$_POST['email']}");
		//Echo a Message which will confirm submission
		echo'Thank you for your message';
	
		$_POST = array();
	}
		else {
			 echo'Fill the form correctly';
		}}
  //Else - Add code that will echo a message telling the user to fill out the form correctly

?>

<table width="60%" align="center">
<tr><td><h1>Contact Form</h1>
<p>Please fill out this form to contact us for any enquiries.</p>
<form action="email.php" method="post">
	<table width="100%">
    <tr><td>Name:</td><td> <input type="text" name="name" size="30" maxlength="60" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td></tr>
	<tr><td>Email Address:</td><td> <input type="text" name="email" size="30" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></td></tr>
	<tr><td colspan="2">Comments and/or Equiries:</td></tr>
     <tr><td colspan="2"><textarea name="comments" rows="5" cols="30"><?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea></td></tr>
	<tr><td colspan="2"><input type="submit" name="submit" value="Send!" /></td></tr></table>
</form></td></tr></table>

</body>
</html>