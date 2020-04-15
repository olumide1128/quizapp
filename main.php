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

	if(isset($_GET['questionid']) && isset($_GET['x']) && isset($_GET['y'])){
	$questionid = $_GET['questionid'];

?>
<script>
	var x = Number("<?php echo $_GET['x']; ?>");
	var y = Number("<?php echo $_GET['y']; ?>");
</script>
<?php  
}else{
?>
<script>
	var x = 1;
	var y = 0;
</script>
<?php
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
				<p id="question" class="mt-4">
					<?php echo $row['question_detail']; ?>
				</p>
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
						<a href="?questionid=<?php echo $questionid - 1; ?>" id="prevLink" class="btn btn-sm btn-danger" onclick="addToPrev()"><i class = "fa fa-arrow-left"></i> Prev</a>
						<?php 
					}

				?>

				<a href="finish.php" id="sub" class="btn btn-sm btn-info">SUBMIT</a>
				
				<?php 

					if($questionid < $row1['num_of_rows']){
						?>
						<a href="?questionid=<?php echo $questionid + 1; ?>" id="nextLink" class="btn btn-sm btn-success" onclick="addToNext()" name="submit">Next <i class = "fa fa-arrow-right"></i></a>
						<?php
					}
					

				 ?>


				
			</div>
				</form>
		</div>
	</div>


	<script>


		var myVar = setInterval(timer, 1000);

		function timer(){

			if(y < 10){
				y = '0'+y;
			}

			var time = x+':'+y
			document.getElementById('time-show').innerHTML = time;
			y-=1;

			if(y < 0){
				y = 59;
				x -= 1;
			}

			if(x == 0 && y == 0){
				location.href = "end.php";
			}
		}

		function addToNext(){
			document.getElementById('nextLink').href += "&x="+x+"&y="+y;
			
		}

		function addToPrev(){
			document.getElementById('prevLink').href += "&x="+x+"&y="+y;
			
		}

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