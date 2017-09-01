<?php
$dbc = mysqli_connect("localhost", "bigserg", "", "my_bigserg", "21") //Connect to your Database (Localhost IP, Username, Password, Databasename, LocalPort)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );


mysqli_set_charset($dbc, 'utf8');

?>