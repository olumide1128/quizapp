<?php

	// $conn = mysqli_connect("localhost","id13250376_root","=Tl5/Xlyd!u?rTz7","id13250376_quizappdb");

	$conn = mysqli_connect("localhost","root","olumysql94","quizappdb");

	// Check connection
	if (!$conn){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>