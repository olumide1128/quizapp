<?php 

	include 'dbconfig.php';

	session_start();

	if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

	$name = $_SESSION['name'];

	//get the user id
	$query = "SELECT user_id FROM user WHERE user_name ='".$name."'";
	$queryresult = mysqli_query($conn, $query);
	$resultarr = mysqli_fetch_assoc($queryresult);
	$userid = $resultarr['user_id'];

 ?>

	<?php
	$questionid = 1;

	if(isset($_GET['questionid'])){
		$questionid = $_GET['questionid'];
	}

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
	<script src="jquery/1.12.2/jquery.min.js"></script>
	<title>Java Quiz | Test</title>
</head>
<body onload="timer()">
	<div id = "frame">
		<div class="container p-2">

			<div class="heading">
				<h2 class="display-4 text-center mb-0 quizname">JAVA QUIZ</h2>
				<p class="text-muted text-center mt-0">The Best Quiz App <i class="fa fa-check text-success"></i></p>
				<button class = "btn btn-sm timedisplay text-muted">Time Left - <span id="time-show" class="text-danger">00:00 <i class="fa fa-clock-o"></i></span></button>
				<hr id="separator">
				<button class = "btn btn-md userdisplay">Welcome <span id="uname"><?php echo $name; ?> <i class="fa fa-user"></i></span></button>
			</div>

			<?php 
				 
				//Code to get details from db
				
				$sql = "SELECT * FROM question WHERE question_id =".$questionid;
				$result = mysqli_query($conn, $sql);

				$row = mysqli_fetch_assoc($result);

				//number of rows
				$sql1 = "SELECT count(*) as 'num_of_rows' FROM question";
				$result1 = mysqli_query($conn, $sql1);
				$row1 = mysqli_fetch_assoc($result1);

				//get user answer
				$sql2 = "SELECT user_answer FROM user_result WHERE user_id = $userid AND question_id = $questionid";
				$result2 = mysqli_query($conn, $sql2);
				$row2 = mysqli_fetch_assoc($result2);


				

			?>

			<div class="body p-4">
				<h4 class="text-center" id="questionnum">- Question <?php echo $row['question_id'];?> -</h4>
				<p class="text-muted text-center" id="note"><i class="fa fa-bell text-danger"></i><strong> Remember to Scroll down when the Scroll bar appears close to a Question.</strong></p>
				<div id="question" class="mt-4">
					<?php echo $row['question_detail']; ?>
				</div>
				<div class="text-center options">
					<form action="" method="POST">
						<div class="form-check-inline">
							<input type="radio" class = "form-check-input" name="Question" value="<?php echo $row['option1']; ?>" <?php echo ($row2['user_answer'] == $row['option1']) ? "checked":""; ?>> <?php echo $row['option1']; ?>
						</div>
						<div class="form-check-inline">
							<input type="radio" class = "form-check-input" name="Question" value="<?php echo $row['option2']; ?>" <?php echo ($row2['user_answer'] == $row['option2']) ? "checked":""; ?>> <?php echo $row['option2']; ?>
						</div>
						<div class="form-check-inline">
							<input type="radio" class = "form-check-input" name="Question" value="<?php echo $row['option3']; ?>" <?php echo ($row2['user_answer'] == $row['option3']) ? "checked":""; ?>> <?php echo $row['option3']; ?>
						</div>
						<div class="form-check-inline">
							<input type="radio" class = "form-check-input" name="Question" value="<?php echo $row['option4']; ?>" <?php echo ($row2['user_answer'] == $row['option4']) ? "checked":""; ?>> <?php echo $row['option4']; ?>
						</div>
					
				</div>
			</div>

			<div class="footer p-2">
				<?php  
					if($row['question_id'] > 1){
						?>
						<a href="?questionid=<?php echo $questionid - 1; ?>" id="prevLink" class="btn btn-sm btn-danger"><i class = "fa fa-arrow-left"> Prev</i></a>
						<?php 
					}

				?>

				<a href="finish.php" id="sub" class="btn btn-sm btn-info">SUBMIT</a>
				
				<?php 

					if($questionid < $row1['num_of_rows']){
						?>
						<a href="?questionid=<?php echo $questionid + 1; ?>" id="nextLink" class="btn btn-sm btn-success">Next <i class = "fa fa-arrow-right"></i></a>
						<?php
					}
					

				 ?>


				
			</div>
				</form>
		</div>
	</div>


	<script>


		var minSession = sessionStorage.getItem("minSession");
		var secSession = sessionStorage.getItem("secSession");

		if(minSession == null){
			sessionStorage.setItem("minSession", 10);
			sessionStorage.setItem("secSession", 0);
		}

		var min = Number(sessionStorage.getItem("minSession"));
		var sec = Number(sessionStorage.getItem("secSession"));


		var myVar = setInterval(timer, 1000);

		function timer(){

			if(sec < 10){
				sec = '0'+sec;
			}

			var time = min+':'+sec
			document.getElementById('time-show').innerHTML = time;
			sec-=1;

			if(sec < 0){
				sec = 59;
				min -= 1;
			}

			if(min == 0 && sec == 0){
				location.href = "end.php";
			}
		}
		

		$('#nextLink').click(function(e){
			e.preventDefault();

			//Store new time as session
			var time = $("#time-show").text();
	    	var minPart = time.split(":")[0];
			var secPart = time.split(":")[1];

			console.log(minPart);
			console.log(secPart);

			var minSession = sessionStorage.setItem("minSession", minPart);
			var secSession = sessionStorage.setItem("secSession", secPart);

			var url = $(this).attr('href');
			var fullUrl = "main.php"+url;
			window.location = fullUrl;
			console.log(fullUrl);

		});



		$('#prevLink').click(function(e){
			e.preventDefault();

			//Store new time as session
			var time = $("#time-show").text();
	    	var minPart = time.split(":")[0];
			var secPart = time.split(":")[1];

			console.log(minPart);
			console.log(secPart);

			var minSession = sessionStorage.setItem("minSession", minPart);
			var secSession = sessionStorage.setItem("secSession", secPart);

			var url = $(this).attr('href');
			var fullUrl = "main.php"+url;
			window.location = fullUrl;
			console.log(fullUrl);
			
		});


		$('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
	        var value = $(this).val(); //Get the clicked checkbox value
	    	var queid = "<?php echo $questionid; ?>";
	    	var userid = "<?php echo $userid; ?>";

			 $.ajax({
			    type:"POST",
			    dataType: "json",
			    url:"insertAns.php",
			    data: {ans:value, queid:queid, userid:userid},
			    success: function (msg) {
			        console.log(msg.answer);
			    }
			});

		});
	</script>



	
</body>
</html>