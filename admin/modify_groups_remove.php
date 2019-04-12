<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	//select a group to delete
	if(isset($_POST['submit'])){
	
		$selected = $_POST['group_ID_selected'];
	
		$sql = "DELETE FROM groups WHERE group_ID = '$selected'";
	
		$query = mysql_query($sql);
	
		header('location:modify_groups.php');
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modify Groups | Remove</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_groups_remove.css">
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
				<p id="text7">
					Remove Group
				</p>
				<form name="delete" method="post" action="" >
					<label id="question_number">
						<p id="text8">
							Select a group to remove&#x3a;
						</p>
						<select id="select" type="select" name="group_ID_selected" >
						<?PHP
							//getting avaliable groups
							$sql = "SELECT group_ID FROM groups";
							$query = mysql_query($sql);
							while($row = mysql_fetch_row($query)){
								echo " <option value='";
								echo $row[0];
								echo "' >";
								echo $row[0];
								echo "</option>"; 
							}
						?>
						</select>
					</label>
					<input id="input" type="submit" name="submit" value="Delete selected group"></input>
				</form>
			</div>
		</div>
	</body>
</html>


