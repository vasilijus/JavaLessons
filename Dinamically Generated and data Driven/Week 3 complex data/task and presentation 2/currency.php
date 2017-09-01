<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

  /* function Name (Parameter) {
  		parameter is going to be used to define the variable } 
   */

  //Create a function for your the Euro and give it one parameter
  //Declare a Variable $cost that will equal the functions parameter*1.32
  //Return the variable

  function Euro($ammount){
	  $cost = $ammount * 1.32;
	  return $cost;
  }
  
  //Parameter*1.36 for Rands
  function Rands($ammount){
	  $cost = $ammount * 1.36;
	  return $cost;
  }
  //Parameter*1.42 for Yen
  function Yen($ammount){
	  $cost = $ammount * 1.42;
	  return $cost; 
  }
  //Parameter*1.45 for US Dollars
  function US_Dollars($ammount){
	  $cost = $ammount * 1.45;
	  return $cost;  
  }
  //Parameters*1.45 for Australian Dollars
  function Aus_Dollars($ammount){
	  $cost = $ammount * 1.45;
	  return $cost;
  }
  
?>  

<form id="form1" name="currency" method="post" action="currency.php">
  <fieldset>
    <h3>
      <legend>Calculator</legend>
    </h3>
    <p>
      <label>Enter Amount of Pounds</label>
      <label for="amount"></label>
      <input type="text" name="amount" id="amount" />
    </p>
    <p>
		<select name="currency">
			<option></option>
			<option value="Euro">Euro</option>
			<option value="Rands">Rands</option>
			<option value="Yen">Yens</option>
			<option value="US_Dollars">US Dolars</option>
			<option value="Aus_Dollars">Australian Dolars</option>
		</select>
    </p>
    <p>
      <input type="submit" name="Submit" id="Submit" value="Calculate" />
      <br />
    </p>
  </fieldset>
</form>

<p> 

<?php

//Requesting Server to access form information

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_REQUEST['amount'])&&is_numeric($_REQUEST['amount'])){
		$pounds=$_REQUEST['amount'];}
	else {
		echo "Please enter a valid amount";
		$pounds=0;}
		if(isset($_POST['currency'])){
		$choice=$_POST['currency'];

  //The $choice variable should start off an IF statement
  //if the $choice is the euro
  
  if($choice == 'Euro') {
  	echo"£".$pounds." will be ".Euro($pounds);
  }
  //echo should produce £... will be 13.2 Euros
	elseif ( $choice == 'Rands') {
		echo"£".$pounds." will be ".Rands($pounds);	
	}
  //elseif the other options
 	elseif ($choice == 'Yen') {
		echo "£".$pounds." will be ".Yen($pounds);	
	}
	elseif( $choice == 'US_Dollars') {
		 echo"£".$pounds." will be ".US_Dollars($pounds);
	}
	elseif ( $choice == 'Aus_-Dollars'){
		echo"£".$pounds." will be ".Aus_Dollars($pounds);
	}
		}
  //else echo "<br />Please Make a Choice";
  	else {
		echo"<br />Please Make a Choice";
	}
			
	}
?>
</p>

</body>
</html>