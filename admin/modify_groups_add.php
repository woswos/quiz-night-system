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
		<title>Modify Groups | Add</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_groups_add.css">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
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
				<a id="text2" href="modify_questions.php">
				Modify Questions
				</a>
				<p id="text3">
					&#x7c;
				</p>
				<a id="text4" href="modify_groups.php">
				Modify Groups
				</a>
				<p id="text5">
					&#x7c;
				</p>
				<a id="text6" href="general_settings.php">
				General Settings
				</a>
			</div>
			<div id="Main" class="clearfix">
				<form name="add_group" method="post" action="create_group.php" autocomplete="off">
					<p id="text7">
						Add Group
					</p>
					<label id="group_number">
						<p id="text8">
							Group Number&#x3a;
						</p>
						<input id="textinput" type="number" value="" name="group_ID" required="required" ></input>
					</label>
					<label id="group_name">
						<p id="text9">
							Group Name&#x3a;
						</p>
						<input id="textinput1" type="text" value="" name="group_name" required="required" ></input>
					</label>
					<label id="_12">
						<p id="text10">
							12<span id="textspan">th</span> Grade&#x3a;
						</p>
						<input id="textinput2" type="text" value="" name="grade_12" ></input>
					</label>
					<label id="_11">
						<p id="text11">
							11th Grade&#x3a;
						</p>
						<input id="textinput3" type="text" value="" name="grade_11" ></input>
					</label>
					<label id="_10">
						<p id="text12">
							10th Grade&#x3a;
						</p>
						<input id="textinput4" type="text" value="" name="grade_10" ></input>
					</label>
					<label id="_9">
						<p id="text13">
							9th Grade&#x3a;
						</p>
						<input id="textinput5" type="text" value="" name="grade_9" ></input>
					</label>
					<label id="prep">
						<p id="text14">
							Prep&#x3a;
						</p>
						<input id="textinput6" type="text" value="" name="prep" ></input>
					</label>
					<label id="teacher">
						<p id="text15">
							Teacher&#x2f;Personnel&#x3a;
						</p>
						<input id="textinput7" type="text" value="" name="teacher_personnel" ></input>
					</label>
					<label id="extra">
						<p id="text16">
							Extra&#x3a;
						</p>
						<input id="textinput8" type="text" value="" name="extra" ></input>
					</label>
					<input id="input" type="submit" value="Add Group" name="submit" ></input>
				</form>
			</div>
		</div>
	</body>
</html>


