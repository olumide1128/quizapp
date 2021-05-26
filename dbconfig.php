<?php


	$conn = mysqli_connect("localhost","<<username>>","<<dbPassword>>","<<dbName>>");

	// Check connection
	if (!$conn){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>
