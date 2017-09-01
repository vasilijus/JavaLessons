<html>
<head>
	<title>Working With If Else If</title>
</head>
<body>
  <h1>Weather Report</h1>
<?php
  
 //Declare a variable named weather and then assign a value sunny
 $weather = 'sunny';
  //if weather is equal to rainy or drizzly
  if ($weather == 'rainy' ||$weather == 'drizzly') {
    // Print "It will be rainy today. Use your umbrella." on the screen as a paragraph
   echo 'It will be rainy today. Use your umbrella.';
  }else if ($weather == 'sunny' ||$weather == 'partially sunny') {
 //Else if weather is equal to sunny or partially sunny
  echo 'It will be sunny today. Wear your sunglasses.';
   // Print "It will be sunny today. Wear your sunglasses." on the screen as a paragraph;
  } else if ($weather == 'snowy' ||$weather == 'icy' ) {
 //Else if weather is equal to snowy or icy
  echo 'It will be snowy today. Bring your shovel.';
    // Print "It will be snowy today. Bring your shovel." as a paragraph
  } else {
 //Else{
    // Print "I don't know what the weather is doing today." as a paragraph
 	echo "I don't know what the weather is doing today.";
 }
  
</body>
</html>