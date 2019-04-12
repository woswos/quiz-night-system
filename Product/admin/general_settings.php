<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$username = $_SESSION['username'];
	
	//setting default value for the time limit input
	$sql = "SELECT time_limit FROM admin WHERE username = '$username'";
	$query = mysql_query($sql);
	while($row = mysql_fetch_row($query)){
		$time_limit = $row[0];
	}
	
	//updating value for the time limit when submitted
	if(isset($_POST['submit'])){
		$user_limit = $_POST['limit'];
	
		$query = "UPDATE admin SET time_limit = '$user_limit' WHERE username = '$username'";
		mysql_query($query);
		header('location:general_settings.php');
	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>General Settings</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/general_settings.css">
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
				<div id="box" class="clearfix">
					<form name="time" action="" method="post">
						<label id="formgroup">
							<p id="text7">
								Time limit for each question &#x28;seconds&#x29;&#x3a;<br />
							</p>
							<input id="textinput" type="text" name="limit" value='<?PHP echo $time_limit; ?>'></input>
						</label>
						<input id="input" type="submit" name="submit" value="Save"></input>
					</form>
				</div>
				<div id="box1" class="clearfix">
					<a href="../admin/show_engine/reset_system.php">
					<input id="reset_the_system" type="button" value="Reset the System"></input>
					</a>
					<a href="general_settings_change_password.php">
					<input id="change_password" type="button" value="Change Password"></input>
					</a>
					<a href="about.php">
					<input id="reset_the_system1" type="button" value="About the System"></input>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>


