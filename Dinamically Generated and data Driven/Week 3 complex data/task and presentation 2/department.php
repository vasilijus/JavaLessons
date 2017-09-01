<html>
<head>
	<title>Students</title>
</head>
<body>
  <h1>Students List</h1>
  <?php
  
  //Create an Associative Array with an appropriate name
  $students=array(
  
  array("name"=>"Theodore Pinto", "department"=>"Engineering"),
  	array('name'=>'Joshua Owen', 'department'=>'Computing'),
	 array('name'=>'Andrew Hunter','department'=>'Business'),
	  array('name'=>'Christopher Domingo','department'=>'Science'),
	   array('name'=>'Alistair Nedved','department'=>'Computing'),
	    array('name'=>'Louise Santos','department'=>'Business'),
		  array('name'=>'Vivien Ivanovic','department'=>'Computing'),
		    array('name'=>'Samuel Bailey','department'=>'Science'),
			  array('name'=>'Ben Ferguson','department'=>'Art'),
			  array('name'=>'Vicky Nicols','department'=>'Computing'),
  );
  //inside the Associative Array add ID Key's for their name and department as values
  //Theodore Pinto - Engineering
  //Joshua Owen - Computing
  //Andrew Hunter - Business
  //Christopher Domingo - Science
  //Alistair Nedved - Computing
  //Louise Santos - Business
  //Vivien Ivanovic - Computing
  //Samuel Bailey - Science
  //Ben Ferguson - Art
  //Vicky Nicols - Computing'),
  
  //create a foreach loop that will echo the students name and department if they are part of the Computing Department
    $i=0;
	foreach($students as $student){
		if($student['department'] == 'Computing'){
			echo"it is ".$student['name']."-".$student['department']." <br />";
	
		}
	}
?>

</body>
</html>