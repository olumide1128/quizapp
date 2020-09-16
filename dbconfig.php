<?php

	// $conn = mysqli_connect("localhost","id13250376_root","=Tl5/Xlyd!u?rTz7","id13250376_quizappdb");

	$conn = mysqli_connect("localhost","<<username>>","<<dbPassword>>","<<dbName>>");

	// Check connection
	if (!$conn){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>
