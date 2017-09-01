<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Simple Calculation</title>
</head>
<body>
<?php 


//Declare a variable named unit_price and then assign a value 5.55
$unit_price=5.55;
//Declare a variable named quantity and then assign a value 25
$quantity=25;
//Declare a variable named vat and then assign a value 17.5
$vat=17.5;

//Multiply unit_price by quantity and then assign the result to a variable named total_cost
$total_cost = $unit_price * $quantity;
//total_cost is equal to total_cost plus total_cost times vat divided by 100
$total_cost=$total_cost + ($total_cost * $vat) / 100;

//Format total so that its displayed with 2 decimal places

$total = number_format($total_cost,2);
//Print "The total cost of 00000 items purchased is £0000 including VAT "
echo"The total cost of " .$quantity." items purchased is £" .$total. " including £".$vat."VAT ";
?>
</body>
</html>