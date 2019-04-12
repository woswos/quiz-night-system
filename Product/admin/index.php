<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quiz Night | Admin Panel</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/index.css">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
		<script src="../jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			   $.get("../admin/show_engine/connected.php", function(data){		  
				var connected = data;
				//alert(data);
				document.getElementById('text1').innerHTML = connected;
				});

			//repating part
			setInterval(function() {
			   $.get("../admin/show_engine/connected.php", function(data){		  
				var connected = data;
				//alert(data);
				document.getElementById('text1').innerHTML = connected;
				});
			}, 1000);
		});
		</script>
	</head>
	<body>
		<div id="primaryContainer" class="primaryContainer clearfix">
			<div id="Main" class="clearfix">
				<p id="text">
					Hello&#x21;
				</p>
				<p id="text1">
				Currently, no group is connected to the system.
				</p>
				<div id="buttons" class="clearfix">
					<a href="show.php">
					<input id="start_the_show" type="button" value="Start the Show"></input>
					</a>
					<a href="modify_questions.php">
					<input id="modify_questions" type="button" value="Modify Questions"></input>
					</a>
					<a href="present_live_scores.php" target="_blank">
					<input id="present_live_scores" type="button" value="Present Live Scores"></input>
					</a>
					<a href="present_questions.php" target="_blank">
					<input id="present_questions" type="button" value="Present Questions"></input>
					</a>
					<a href="view_overall_scores.php">
					<input id="view_overall_scores" type="button" value="View Overall Scores"></input>
					</a>
					<a href="modify_groups.php">
					<input id="modify_groups" type="button" value="Modify Groups"></input>
					</a>
					<a href="general_settings.php">
					<input id="general_settings" type="button" value="General Settings"></input>
					</a>
					<a href="sign_out.php">
					<input id="sign_out" type="button" value="Sign Out"></input>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>


