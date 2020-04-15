
<?php 

	include 'dbconfig.php';

	if(isset($_POST['ans']) && isset($_POST['userid']) && isset($_POST['queid'])){

		$ans = $_POST['ans'];
		$userid = $_POST['userid'];
		$quesid = $_POST['queid'];

		//Check if answer is correct or wrong
		$checkAnsSql = "SELECT * FROM answer WHERE correct_answer = '$ans'";
		$checkAnsQuery = mysqli_query($conn, $checkAnsSql);

		$status = (mysqli_num_rows($checkAnsQuery) > 0) ? 1:0;

		//Check if answer to question already exist in db
		$checkQuestionSql = "SELECT * FROM user_result WHERE user_id = $userid AND question_id = $quesid";
		$checkQuestionQuery = mysqli_query($conn, $checkQuestionSql);

		if(mysqli_num_rows($checkQuestionQuery) > 0){
			//update
			$updateSql = "UPDATE user_result SET user_answer = '$ans', status = $status WHERE user_id = $userid AND question_id = $quesid";
			mysqli_query($conn, $updateSql);

		}else{
			//insert
			$insertSql = "INSERT INTO user_result(user_id, question_id, user_answer, status) VALUES($userid, $quesid, '$ans', $status)";
			mysqli_query($conn, $insertSql);
		}

	}




		//response to send back
		$msg = array("id"=>$_POST['queid'], 
				'answer'=>$_POST['ans']
			);

		echo json_encode($msg);


 ?>