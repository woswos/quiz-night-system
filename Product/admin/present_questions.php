<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	//getting variables
	$next_question = $_SESSION['next_question'];
	$show_ended = $_SESSION['show_ended'];
	$bonus_time = $_SESSION['bonus_time']; 
	
	if(!isset($_SESSION['current_question_ID'])||($show_ended == 1)){
		header('location:../admin/show_engine/pre_show.php');
	}else {
		$current_question_ID = $_SESSION['current_question_ID'];
	}
	
	if($bonus_time == 1){
		header('location:../admin/show_engine/present_questions_bonus.php');
	}
	

	if($next_question == 1){
		$current_question_ID++;
		$_SESSION['current_question_ID'] = $current_question_ID;
	}

	$_SESSION['next_question'] = 0;

	/*
	//to stay in the borders
	if($current_question_ID > 21){
		$current_question_ID = 21;
		$_SESSION['current_question_ID'] = $current_question_ID;
	}
	*/
	
	//getting question information
	$sql = "SELECT * FROM questions WHERE question_ID = '$current_question_ID'";
	$query = mysql_query($sql);
	while($row = mysql_fetch_row($query)){
		$question_ID = $row[0];
		$question = $row[1];
		$answer = $row[2];
		$type = $row[4];
	}
	
	if($type == "Normal"){
		$type = " ";
	}

	if($question_ID == 21){
		$seyirci = 1;
	}else {
		$seyirci = 0;
	}

	//setting default value for the time limit input
	$username = $_SESSION['username'];
	$sql = "SELECT time_limit FROM admin WHERE username = '$username'";
	$query = mysql_query($sql);
	while($row = mysql_fetch_row($query)){
		$time_limit = $row[0];
	}
	$_SESSION['time_limit'] = $time_limit;

	//showing the timer or not
	$time_end = $_SESSION['time_end'];
	if($time_end == 0){
	$show_answer = 0;
	echo '<!DOCTYPE html>
		<html>
			<head>
				<title>Present Questions | '; echo $current_question_ID; echo '</title>
				<link rel="stylesheet" href="../admin/css/boilerplate.css">
				<link rel="stylesheet" href="../admin/css/present_questions.css">
				<script src="../jquery.min.js"></script>
					<script>
						$(document).ready(function(){

						   $.ajaxSetup({cache: false})

						   $.get("../admin/show_engine/get_time.php", function(data){		  

							var seconds = data;
		
							document.getElementById("countdown").innerHTML = seconds;

							seconds = seconds - 1;

							function secondPassed() {
							  var minutes = Math.round((seconds - 30) / 60);
							  var remainingSeconds = seconds % 60;
							 
							 if ((remainingSeconds < 10)&&(minutes > 0)) {
							    remainingSeconds = "0" + remainingSeconds;
							  }

							  if (minutes == 0){
								document.getElementById("countdown").innerHTML = remainingSeconds;
							  }else{
								document.getElementById("countdown").innerHTML = minutes + ":" + remainingSeconds;
							  }
							  
							  if (seconds == 0) {
							    clearInterval(countdownTimer);
							    document.getElementById("countdown").innerHTML = "0";


								$.post("../admin/show_engine/time_end.php", function(data, status){
									location.reload(); 
						    		});


							  }else {
							    seconds--;
							  }
							}

							var countdownTimer = setInterval(secondPassed, 1000);

							});
						});
					</script>
	';
	}else {
		$show_answer = 1;
		echo '<!DOCTYPE html>
		<html>
			<head>
				<title>Present Questions | '; echo $current_question_ID; echo '</title>
				<link rel="stylesheet" href="../admin/css/boilerplate.css">
				<link rel="stylesheet" href="../admin/css/present_questions.css">
				<script src="../jquery.min.js"></script>
				<script>	
					$(document).ready(function(){
						document.getElementById("countdown").innerHTML = "0";		
					});
				</script>
				<meta http-equiv="refresh" content="1">
		';
	}
?>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
	</head>
	<body>
		<div id="primaryContainer" class="primaryContainer clearfix">
			<div id="Main" class="clearfix">
				<p id="title">
					<?PHP
					if($seyirci == 1){
						echo "SEYİRCİ SORUSU";
					}else {
						echo "SORU &#x2f; QUESTION <a style='font-size: 120px;' >";
						echo $question_ID;
						echo "</a>";
					}
					?>
				</p>
				<p id="question">
					<?PHP echo $question; ?>
				</p>
				<p id="answer">
					<?PHP if($show_answer == 1){ sleep(1); echo $answer; } ?>
				</p>
				<p id="text">
					<?PHP echo $type; ?><br/>
				</p>
				<p id="timer">
					<span id="countdown" class="timer" style="font-size: 120px;" ></span>
				</p>
			</div>
		</div>
	</body>
</html>
