<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$show_started = $_SESSION['show_started'];
	if($show_started == 1){
		header('location:show_start.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quiz Night | Show</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/show.css">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
		<script src="../jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				   $.get("../admin/show_engine/connected.php", function(data){		  
					var connected = data;
					//alert(data);
					document.getElementById('Currently_groups_are_connected_to_the_system_').innerHTML = connected;
					});

				   $.get("../admin/show_engine/connected_groups.php", function(data){		  
					var connected_groups = data;
					//alert(data);
					document.getElementById('Connected_groups_1_2_3').innerHTML = "Connected groups&#x3a;" + connected_groups;
					});

				//repating part
				setInterval(function() {
				   $.get("../admin/show_engine/connected.php", function(data){		  
					var connected = data;
					//alert(data);
					document.getElementById('Currently_groups_are_connected_to_the_system_').innerHTML = connected;
					});

				   $.get("../admin/show_engine/connected_groups.php", function(data){		  
					var connected_groups = data;
					//alert(data);
					document.getElementById('Connected_groups_1_2_3').innerHTML = "Connected groups&#x3a;" + connected_groups;
					});
				}, 1000);
			});
		</script>
	</head>
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
				<p id="Currently_groups_are_connected_to_the_system_">
				Currently, no group is connected to the system.
				</p>
				<p id="Connected_groups_1_2_3">
				Connected groups&#x3a;
				</p>
				<div id="dynamic" class="clearfix">
					<p id="text7">
						Are live scores ready&#x3f;<br />Is the projector for the questions ready&#x3f;<br />Are there any connection problems&#x3f;<br />Don't forget to open "Present Questions" page on a separate page!
					</p>
					<a href="../admin/show_engine/get_ready.php">
					<input id="input" type="button" value="Everything is ready, show the first question"></input>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>


