<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$error = " ";
	$username = $_SESSION['username'];
	
	//updating password when submitted
	if(isset($_POST['submit'])){
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
	
		if(($pass1 == $pass2)&&($pass1 != '')){
			$pass1 = md5($pass1);
			$query = "UPDATE admin SET password = '$pass1' WHERE username = '$username'";
			mysql_query($query);
			$error = "Your password has been successfully changed.";
		}else{
			$error = "Passwords don't match!";
		}
	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/general_settings_change_password.css">
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
				<form name="change" action="" method="post">
					<label id="username">
						<p id="text7">
							New Password&#x3a;
						</p>
						<input id="username1" type="password" name="pass1" value=""></input>
					</label>
					<label id="password">
						<p id="text8">
							New Password &#x28;Again&#x29;&#x3a;
						</p>
						<input id="password1" type="password" name="pass2" value=""></input>
					</label>
					<a href="general_settings_change_password.php">
					<input id="sign_in" type="submit" name="submit" value="Change Password"></input>
					</a>
					<p id="text9">
						<?PHP echo $error; ?>
					</p>
				</form>
			</div>
		</div>
	</body>
</html>


