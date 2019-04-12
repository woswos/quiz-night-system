<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$select_state = "disabled='disabled'";
	
	//select a group to edit
	if(isset($_POST['submit'])){
		
		$select_state = ' ';
	
		$selected = $_POST['group_ID_selected'];
	
		$sql = "SELECT * FROM groups WHERE group_ID = '$selected'";
	
		$query = mysql_query($sql);
		while($row = mysql_fetch_row($query)){
			$group_ID = $row[0];
			$group_name = $row[1];
			$grade_12 = $row[2];
			$grade_11 = $row[3];
			$grade_10 = $row[4];
			$grade_9 = $row[5];
			$prep = $row[6];
			$teacher_personnel = $row[7];
			$extra = $row[8];
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modify Groups | Edit</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_groups_edit.css">
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
					Edit Group
				</p>
				<form name="select" action="" method="post" autocomplete="off">
					<label id="initial_group_number">
						<p id="text8">
							Select a group to edit&#x3a;
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
					<input id="input" type="submit" name="submit" value="Select"></input>
				</form>
				<form name="save" action="create_group.php" method="post" autocomplete="off">
					<label id="group_number">
						<p id="text9">
							Group Number&#x3a;
						</p>
						<input id="textinput" type="number" required="required" <?PHP echo "value='"; echo $group_ID; echo "'"; ?> name="group_ID" ></input>
					</label>
					<label id="group_name">
						<p id="text10">
							Group Name&#x3a;
						</p>
						<input id="textinput1" type="text" required="required" <?PHP echo "value='"; echo $group_name; echo "'"; ?> name="group_name" ></input>
					</label>
					<label id="_12">
						<p id="text11">
							12<span id="textspan">th</span> Grade&#x3a;
						</p>
						<input id="textinput2" type="text" <?PHP echo "value='"; echo $grade_12; echo "'"; ?> name="grade_12" ></input>
					</label>
					<label id="_11">
						<p id="text12">
							11th Grade&#x3a;
						</p>
						<input id="textinput3" type="text" <?PHP echo "value='"; echo $grade_11; echo "'"; ?> name="grade_11" ></input>
					</label>
					<label id="_10">
						<p id="text13">
							10th Grade&#x3a;
						</p>
						<input id="textinput4" type="text" <?PHP echo "value='"; echo $grade_10; echo "'"; ?> name="grade_10" ></input>
					</label>
					<label id="_9">
						<p id="text14">
							9th Grade&#x3a;
						</p>
						<input id="textinput5" type="text" <?PHP echo "value='"; echo $grade_9; echo "'"; ?> name="grade_9" ></input>
					</label>
					<label id="prep">
						<p id="text15">
							Prep&#x3a;
						</p>
						<input id="textinput6" type="text" <?PHP echo "value='"; echo $prep; echo "'"; ?> name="prep" ></input>
					</label>
					<label id="teacher">
						<p id="text16">
							Teacher&#x2f;Personnel&#x3a;
						</p>
						<input id="textinput7" type="text" <?PHP echo "value='"; echo $teacher_personnel; echo "'"; ?> name="teacher_personnel" ></input>
					</label>
					<label id="extra">
						<p id="text17">
							Extra&#x3a;
						</p>
						<input id="textinput8" type="text" <?PHP echo "value='"; echo $extra; echo "'"; ?> name="extra" ></input>
					</label>
					<input id="input1" type="submit" name="submit" value="Save Group" <?PHP echo $select_state; ?> ></input>
				</form>
			</div>
		</div>
	</body>
</html>


