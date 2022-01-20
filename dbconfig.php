<?php


	$conn = mysqli_connect("localhost","root","olumysql94","quizappdb");

	// Check connection
	if (!$conn){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>
