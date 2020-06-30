<?php
	
	require 'dbconfig.php';

	if(!$conn){
		die("Cant connect to database". mysqli_connect_error());
	}


	if(isset($_POST['submit'])){
		$question = mysqli_real_escape_string($conn, $_POST['question']);
		$option1 = mysqli_real_escape_string($conn, $_POST['option1']);
		$option2 = mysqli_real_escape_string($conn, $_POST['option2']);
		$option3 = mysqli_real_escape_string($conn, $_POST['option3']);
		$option4 = mysqli_real_escape_string($conn, $_POST['option4']);
		$Answer = mysqli_real_escape_string($conn, $_POST['answer']);

		$latest_id;

		$sql = "INSERT INTO question (question_detail, option1, option2, option3, option4) VALUES('".$question."', '".$option1."', '".$option2."', '".$option3."', '".$option4."')";
		if(mysqli_query($conn, $sql)){
			$latest_id = mysqli_insert_id($conn);	
		}else{
			echo "An error occurred".mysqli_error($conn);
		}
		
		$sql2 = "INSERT INTO answer (question_id, correct_answer) VALUES (".$latest_id.", '".$Answer."')";

		if(mysqli_query($conn, $sql2)){
			echo "New Question Added Successfully!";
		}else{
			echo "An error2 occurred".mysqli_error($conn);
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
		<div class="container2 p-2">

			<div class="heading">
				<h2 class="display-4 text-center mb-0 quizname">JAVA QUIZ</h2>
				<p class="text-muted text-center mt-0 desc">ADD A QUESTION</p>
				<hr id="separator">
			</div>

			<div class="bodyAddQuestion p-4">
				<form action="" method="POST" class="form">
					<textarea name="question" id="myTextarea" class="form-control" rows="5" placeholder="Question.."></textarea>
					<br>
					<input type="text" id="option1" class="form-control" name="option1" placeholder="Option 1..">
					<br>
					<input type="text" id="option2" class="form-control" name="option2" placeholder="Option 2..">
					<br>
					<input type="text" id="option3" class="form-control" name="option3" placeholder="Option 3..">
					<br>
					<input type="text" id="option4" class="form-control" name="option4" placeholder="Option 4..">
					<br>
					<input type="text" id="Answer" class="form-control" name="answer" placeholder="Answer..">
					<br>
					<input type="submit" id="submit" name="submit" value="Post" class="btn btn-info">
				</form>
			</div>
			
		</div>
	</div>
	

	<script src="jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        	$(document).ready(function(){

        		tinymce.init({
			    selector: '#myTextarea',
			    height: 500,
			    theme: 'modern',
			    plugins: [
			      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			      'searchreplace wordcount visualblocks visualchars code fullscreen',
			      'insertdatetime media nonbreaking save table contextmenu directionality',
			      'emoticons template paste textcolor colorpicker textpattern imagetools'
			    ],
			    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			    toolbar2: 'print preview media | forecolor backcolor emoticons',
			    image_advtab: true,
			    file_picker_callback: function(callback, value, meta) {
		            if (meta.filetype == 'image') {
		              $('#upload').trigger('click');
		              $('#upload').on('change', function() {
		                var file = this.files[0];
		                var reader = new FileReader();
		                reader.onload = function(e) {
		                  callback(e.target.result, {
		                    alt: ''
		                  });
		                };
		                reader.readAsDataURL(file);
		              });
		            }
	          	}
			});
 
        });
        	

        </script>
</body>
</html>

