<html>
<head>
	<title>Yearly Average Temperature</title>
</head>
<body>

<?php
  
  //Create a Numeric Array containing all the months of the year
  $Months=array('January','February','March','April','May','June','July','August','September','October','November','December');
  //Create a Numeric array containing temperature values 34-56-49-23-21-12-11-34-29-30-19-23
  $Temp= array('34','56','49','23','21','12','11','34','29','30','19','23');
  //Declare two variables, one for the $total and one for the $average and give them a default value
  $total = 0; 
  $average = 0;

  //Creat a For Loop that will count the months in an increment of 1
  for($i=0; $i=count($Months); $i++) {  
		  
	  echo $Months[$i]." ".$Temp[$i]."<br />";
	  $total= $total + $Temp[$i];
  }
  //HINT - $total=$total+$temp[$i];

$average=$total/12;
echo "The average for the 12 months is ".number_format($average,2);
  ?>
  
</body>
</html>