<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	}
	
	//getting variables
	$question_ID = $_POST['question_ID'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$bonus_or_not = $_POST['bonus_or_not'];
	//checkbox to 1 and 0
	if($bonus_or_not == 'on'){
			$bonus_or_not = '1';
		}else {
			$bonus_or_not = '0';
		}
	$type = $_POST['type'];
	
	/*
	echo $question_ID;
	echo '<br>';
	echo $question;
	echo '<br>';
	echo $answer;
	echo '<br>';
	echo $bonus_or_not;
	echo '<br>';
	echo $type;
	*/
	
	
	$sql = "SELECT * FROM questions WHERE question_ID = '$question_ID'";
	
	$result = mysql_query($sql);
	
	$numrows = mysql_num_rows($result);
	
	//deciding to update or insert a question
	if($numrows > 0){
		$query = "UPDATE questions SET question_ID = '$question_ID', question = '$question', answer = '$answer', bonus_or_not = '$bonus_or_not', type = '$type' WHERE question_ID = '$question_ID'";
		mysql_query($query);
		
		echo "Question is successfully updated!";
	
	}
	else{
		$query = "INSERT INTO  questions (question_ID, question, answer, bonus_or_not, type) VALUES ('$question_ID', '$question','$answer','$bonus_or_not','$type')";
		mysql_query($query);
	
		echo "Question is successfully added!";
	}
		
?>

<HTML>
	<head>
		<link rel="shortcut icon" >
		<meta http-equiv='REFRESH' content='1;url=modify_questions.php'>
	</head>
</HTML>


