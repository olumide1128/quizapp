<?php
	
	session_start();
	session_unset();
	session_destroy();
	


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap4-Beta/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<title>Java Quiz | Test</title>
</head>

<body>
	<div id = "frame">
		<div class="container p-2">

			<div class="heading">
				<h2 class="display-4 text-center mb-0 quizname">JAVA QUIZ</h2>
				<p class="text-muted text-center mt-0">The Best Quiz App <i class="fa fa-check text-success"></i></p>
				<hr id="separator">
			</div>

			<div class="end-body p-4">
				
				<h2 class="display-4 warn">Your Time is Up! <i class="fa fa-clock-o text-danger" ></i></h2>
				<p class="text-muted">Thanks for taking the Quiz.</p>
				<p class="fa fa-certificate text-success"></p>
				
			</div>
				
			<div class="footer p-2">
				
			</div>
		</div>
	</div>
</body>
</html>

