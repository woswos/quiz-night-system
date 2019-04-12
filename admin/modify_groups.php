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
		<title>Modify Groups</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_groups.css">
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
				<a href="modify_groups_add.php">
				<input id="add" type="button" value="Add Group"></input>
				</a>
				<a href="modify_groups_edit.php">
				<input id="edit" type="button" value="Edit Group"></input>
				</a>
				<a href="modify_groups_remove.php">
				<input id="remove" type="button" value="Remove Group"></input>
				</a>
				<a href="modify_groups_reset.php">
				<input id="reset" type="button" value="Reset Group Password"></input>
				</a>
				<p id="current_questions">
					Current Groups&#x3a;
				</p>
				<div id="table" class="clearfix">
					<table>
						<tr >
							<th>#</th>
							<th>Group Name</th>
							<th>12th Grade</th>
							<th>11th Grade</th>
							<th>10th Grade</th>
							<th>9th Grade</th>
							<th>Prep</th>
							<th>Teacher/Personnel</th>
							<th>Extra</th>
						</tr>
						<?PHP
							$sql = "SELECT * FROM groups";
							$query = mysql_query($sql);
							while($row = mysql_fetch_row($query)){
								echo "<tr>";
							
								echo "<td>$row[0]</td>";
							
								if($row[1] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[1]</td>";
								} 
							
								if($row[2] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[2]</td>";
								}
							
								if($row[3] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[3]</td>";
								} 
							
								if($row[4] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[4]</td>";
								} 
							
								if($row[5] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[5]</td>";
								}
							
								if($row[6] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[6]</td>";
								}
							
								if($row[7] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[7]</td>";
								}
							
								if($row[8] == ""){
									echo "<td>-</td>";
								} else{
									echo "<td>$row[8]</td>";
								}
							
								echo "<tr>";
								
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>


