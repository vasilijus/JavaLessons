<html>
<head>
	<title>Calculation</title>
</head>
<body>
  <h1>Calculation</h1>
  
  <?php
  
  //Create a Function that will add two numbers together
  function addNumbers($num1, $num2) {
  //Create two parameters within the Function
  //Declare a variable that will add the numbers together
  $sum = $num1 + $num2;
  //Return the variable
  return $sum;
  }
  //Declare two variable with two different integers
  $first = 54;
  $second= 101;
  $total=addNumbers($first,$second);
  //Echo "The sum of the two numbers is " + the function
  echo'The sum of the two numbers is'.$total."<br />";
//Do the same for Subtracting, dividing and multiplying


  function subNumbers($num1, $num2) {
  $sum = $num1 - $num2;
  return $sum;
  }
   $first = 54;
  $second= 101;
  $total=subNumbers($first,$second);
echo'The sum of the two numbers is'.$total."<br />";
  
  function multNumbers($num1, $num2) {
  $sum = $num1 * $num2;
  return $sum;
  }
  $first = 54;
  $second= 101;
  $total=multNumbers($first,$second);
  echo'The sum of the two numbers is'.$total."<br />";
  
    function devNumbers($num1, $num2) {
  $sum = $num1 / $num2;
  return $sum;
  }
  
  $first = 54;
  $second= 101;
  $total=devNumbers($first,$second);
  echo'The sum of the two numbers is'.$total."<br />";
  ?>
</body>
</html>