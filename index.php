<?php
	
	require 'dbconfig.php';

	session_start();
	$errormsg;

	if(isset($_POST["submit"])){
		if(!empty($_POST["name"])){
			if(preg_match("/^[A-Za-z ]+$/", $_POST["name"])){
				$_SESSION['name'] = $_POST["name"];
				$name = $_POST["name"];
				$sql = "SELECT * FROM user WHERE user_name ='".$name."'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					header("Location: main.php");
				}else{
					$sql1 = "INSERT INTO user (user_name) VALUES ('".$name."')";
					mysqli_query($conn, $sql1);
					header("Location: main.php");
				}
				
			}else{
				$errormsg = "Only Letters are allowed!";
			}
		}else{
			$errormsg = "You must enter a name!";
		}
		
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap4-Beta/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<title>Java Quiz | Test</title>
</head>

<body>
	<div id = "frame">
		<div class="container p-2">

			<div class="heading">
				<h2 class="display-4 text-center mb-0 quizname">JAVA QUIZ</h2>
				<p class="text-muted text-center mt-0 desc">The Best Quiz App <i class="fa fa-check text-success"></i></p>
				<hr id="separator">
			</div>

			<div class="bodyy p-4">
				
				<form action="" method="POST" class="form">
					<input type="text" id="inputfield" name = "name" placeholder="Enter name..">
					<br>
					<input type="submit" class = "bg-success text-white" id = "submit" name="submit" value="START">
				</form>
				<br>
				<?php 

					if(isset($errormsg)){

						echo "<div class='alert alert-danger' id='err'>";
						echo $errormsg;
						echo "</div>";
					}

				?>
			</div>
				
			<div class="footer p-2">
				
			</div>
		</div>
	</div>
</body>
</html>

