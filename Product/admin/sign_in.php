<?PHP
	session_start();
	
	if($_SESSION['login'] == 1){
			header('location:index.php');
	}
	 
	include('../db_connect.php');
	
	$error = ' ';
	
	//login check on submit
	if(isset($_POST['submit'])){
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$password = md5($password);
		$_SESSION['username'] = $_POST['username'];
	  
		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
	
		$result = mysql_query($sql);
	
		$numrows = mysql_num_rows($result);
	
	
		if($numrows > 0){
			$_SESSION['login'] = 1;
			header('location:index.php');
		}
		else{
			$error = 'Wrong username or password&#x21;';
		}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quiz Night | Sign In</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/sign_in.css">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
	</head>
	<body>
		<div id="primaryContainer" class="primaryContainer clearfix">
			<div id="Main" class="clearfix">
				<p id="text">
					Welcome&#x21;
				</p>
				<p id="text1">
					Access to Admin Panel
				</p>
				<form name="login" action="" method="post" autocomplete="off">
					<label id="username">
						<p id="text2">
							Username&#x3a;
						</p>
						<input id="username1" type="text" name="username" autocomplete="off" ></input>
					</label>
					<label id="password">
						<p id="text3">
							Password&#x3a;
						</p>
						<input id="password1" type="password" name="password" autocomplete="off" ></input>
					</label>
					<a href="index.php">
					<input id="sign_in" type="submit" value="Sign In" name="submit" ></input>
					</a>
				</form>
				<p id="text4">
					<?PHP echo $error; ?>
				</p>
			</div>
		</div>
	</body>
</html>


