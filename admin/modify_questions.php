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
		<title>Modify Questions</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_questions.css">
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
				<a href="modify_questions_add.php">
				<input id="add" type="button" value="Add Question"></input>
				</a>
				<a href="modify_questions_edit.php">
				<input id="edit" type="button" value="Edit Question"></input>
				</a>
				<a href="modify_questions_remove.php">
				<input id="remove" type="button" value="Remove Question"></input>
				</a>
				<p id="current_questions">
					Current Questions&#x3a;
				</p>
				<div id="table" class="clearfix">
					<table>
						<tr >
							<th>#</th>
							<th>Question</th>
							<th>Answer</th>
							<th>Bonus</th>
							<th>Type</th>
						</tr>
						<?PHP
							$sql = "SELECT * FROM questions";
							$query = mysql_query($sql);
							while($row = mysql_fetch_row($query)){
								echo "<tr>";

								//first column
								if($row[0] == 21){
									echo "<td>Seyirci</td>";
								}
								else {
									echo "<td>$row[0]</td>";
								}

								//second and third column
								echo " 
										<td>$row[1]</td>
										<td>$row[2]</td>
									";
								//fourth column
								if($row[3] == 1){
									$bonus = 'Yes';
								}
								else {
									$bonus = 'No';
								}
							
								echo "<td>$bonus</td>";

								//fifth column
								echo "<td>$row[4]</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>


