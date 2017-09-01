<html>
<head>
	<title>Working With If Else If</title>
</head>
<body>
  <h1>Weather Report</h1>
  <?php
  
 //Declare a Variable named weather and give it the value sunny
  $weather = 'sunny';
   // Create a Switch Statement
switch($weather) {
 //in the case that the weather is rainy
  case'rainy':
   // echo "It will be rainy today. Use your umbrella."
echo"It will be rainy today. Use your umbrella.";
break;

 //in the case that the weather is sunny
  case'sunny':
   // echo "It will be sunny today. Wear your sunglasses."	
echo"It will be sunny today. Wear your sunglasses.";
break;
 //In the case that the weather is snowy
  case'snowy':
   // echo "It will be snowy today. Bring your shovel."	
echo"It will be snowy today. Bring your shovel.";
break;
 //If it is none of the above
  default:
   // echo "I don't know what the weather is doing today."
	echo"I don't know what the weather is doing today.";
}
  ?>
</body>
</html>