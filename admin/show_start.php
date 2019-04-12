<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$time_end = $_SESSION['time_end'];

	//getting variables
	$next_question = $_SESSION['next_question'];
	
	$current_question_ID = $_SESSION['current_question_ID'];

	$show_ended = $_SESSION['show_ended'];

	$bonus_time = $_SESSION['bonus_time'];

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

	if($time_end != 1){
		$current_question_ID = $_SESSION['current_question_ID'];
		echo '
		<!DOCTYPE html>
		<html>
			<head>
				<title>Quiz Night | Show</title>
				<link rel="stylesheet" href="../admin/css/boilerplate.css">
				<link rel="stylesheet" href="../admin/css/show_start.css">
				<meta charset="utf-8">
				<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
				<script src="../jquery.min.js"></script>
				<script>
					

					$(document).ready(function(){				
										
							$.ajaxSetup({cache: false})
							
							$.get("../admin/show_engine/connected.php", function(data){		  
							var connected = data;
							//alert(data);
							document.getElementById("current_groups_name").innerHTML = connected;
							});

						   $.get("../admin/show_engine/connected_groups.php", function(data){		  
							var connected_groups = data;
							//alert(data);
							document.getElementById("connected_groups").innerHTML = "Connected groups&#x3a; " + connected_groups;
							});

						    $.get("../admin/show_engine/answers.php", function(data){		  
							var answers = data;
							//alert(data);
							document.getElementById("table").innerHTML = answers;
							});

							$.get("../admin/show_engine/db_show_status.php", function(data){ });
							
						//repating part
						setInterval(function() {
						   $.get("../admin/show_engine/connected.php", function(data){		  
							var connected = data;
							//alert(data);
							document.getElementById("current_groups_name").innerHTML = connected;
							});

						   $.get("../admin/show_engine/connected_groups.php", function(data){		  
							var connected_groups = data;
							//alert(data);
							document.getElementById("connected_groups").innerHTML = "Connected groups&#x3a; " + connected_groups;
							});

						    $.get("../admin/show_engine/answers.php", function(data){		  
							var answers = data;
							//alert(data);
							document.getElementById("table").innerHTML = answers;
							});
							
						    $.get("../admin/show_engine/time_status.php", function(data, status){
									var time_end = data;
									//alert(time_end);

									if(time_end == 1){
										location.reload(); 
									}
						     });
							
							//$.post("../admin/show_engine/db_show_status.php", function(data){ });


						}, 1000);
					});
				</script>
			</head>
			';
	}else {
		echo '
			<!DOCTYPE html>
			<html>
				<head>
					<title>Quiz Night | Show</title>
					<link rel="stylesheet" href="../admin/css/boilerplate.css">
					<link rel="stylesheet" href="../admin/css/show_start.css">
					<meta charset="utf-8">
					<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
					<script src="../jquery.min.js"></script>
					<script>
						$(document).ready(function(){

							$.ajaxSetup({cache: false})
							
							$.get("../admin/show_engine/connected.php", function(data){		  
							var connected = data;
							//alert(data);
							document.getElementById("current_groups_name").innerHTML = connected;
							});

						   $.get("../admin/show_engine/connected_groups.php", function(data){		  
							var connected_groups = data;
							//alert(data);
							document.getElementById("connected_groups").innerHTML = "Connected groups&#x3a; " + connected_groups;
							});

							$.post("../admin/show_engine/db_show_status.php", function(data){ });

							//repating part
							setInterval(function() {
							   $.get("../admin/show_engine/connected.php", function(data){		  
								var connected = data;
								//alert(data);
								document.getElementById("current_groups_name").innerHTML = connected;
								});

							   $.get("../admin/show_engine/connected_groups.php", function(data){		  
								var connected_groups = data;
								//alert(data);
								document.getElementById("connected_groups").innerHTML = "Connected groups&#x3a; " + connected_groups;
								});
					
								//$.post("../admin/show_engine/db_show_status.php", function(data){ });

							}, 1000);';

				include('../admin/show_engine/answers_js.php');

				echo '	
						});
					</script>
				</head>			
			';
	}

?>
	<body>
		<div id="primaryContainer" class="primaryContainer clearfix">
			<div id="line" class="clearfix">
			</div>
			<div id="navigation" class="clearfix">
				<a id="text" href="index.php">
				Admin Panel
				</a>
				<p id="text1">
					&#x7c;
				</p>
				<a id="text2" href="show.php">
				Start the Show
				</a>
				<p id="text3">
					&#x7c;
				</p>
				<a id="text4" href="present_live_scores.php" target="_blank">
				Present Live Scores
				</a>
				<p id="text5">
					&#x7c;
				</p>
				<a id="text6" href="present_questions.php" target="_blank">
				Present Questions
				</a>
			</div>
			<div id="Main" class="clearfix">
				<p id="current_groups_name">
				Currently, no group is connected to the system.
				</p>
				<p id="connected_groups">
				Connected groups&#x3a; 
				</p>
				<p id="current_question">
				Current question&#x3a; <?PHP echo $current_question_ID; ?>
				</p>
				<div id="dynamic" class="clearfix">
					<div id="curent_question" class="clearfix">
						<p id="text7">
							&nbsp;Current Question&#x3a;
						</p>
						<p id="text8">
							<?PHP echo $question; ?>
						</p>
					</div>
					<div id="answer" class="clearfix">
						<p id="Current_Question_">
							&nbsp;Answer for Current Question&#x3a;
						</p>
						<p id="text9">
							<?PHP echo $answer; ?>
						</p>
					</div>
					<div id="table" class="clearfix">
					<?PHP
						if($time_end != 1){
							echo "
								<br>
								<table>
									<tr >
										<th>Group Number</th>
										<th>Bonus or Not</th>
										<th>Groups' Answers</th>
										<th>Check</th>
									</tr>
								</table>
								<br>";
						}else {
							include('../admin/show_engine/answers.php');
						}
					?>
					</div>
					<form name="next_question" method="post" action="../admin/show_engine/next_question.php" >
						<input id="input" type="submit" name="submit" value="<?php if($current_question_ID == 21){echo 'Confirm and finish the show';}else{echo 'Confirm and proceed to next question' ;} ?>" <?PHP if($time_end != 1){echo'disabled="disabled" style="text-decoration: line-through;"';} ?> >
					</form>
					<br>
				</div>
			</div>
		</div>
	</body>
</html>
