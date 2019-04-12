<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	//getting avaliable questions
	$avaliable_questions = [];
	$sql = "SELECT question_ID FROM questions";
	$query = mysql_query($sql);
	while($row = mysql_fetch_row($query)){
		$avaliable_questions[] = $row[0];
	}
	
	//select a question to delete
	if(isset($_POST['submit'])){
	
		$selected = $_POST['question_ID_selected'];
	
		$sql = "DELETE FROM questions WHERE question_ID = '$selected'";
	
		$query = mysql_query($sql);
		header('location:modify_questions.php');
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modify Questions | Remove</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_questions_remove.css">
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
					Remove Question
				</p>
				<form name="delete" method="post" action="" >
					<label id="question_number">
						<p id="text8">
							Select a question to remove&#x3a;
						</p>
						<select id="select" type="select" name="question_ID_selected" >
							<option value="1" <?PHP if (!in_array("1", $avaliable_questions)) {echo "disabled='disabled'";} ?> >1</option>
							<option value="2" <?PHP if (!in_array("2", $avaliable_questions)) {echo "disabled='disabled'";} ?> >2</option>
							<option value="3" <?PHP if (!in_array("3", $avaliable_questions)) {echo "disabled='disabled'";} ?> >3</option>
							<option value="4" <?PHP if (!in_array("4", $avaliable_questions)) {echo "disabled='disabled'";} ?> >4</option>
							<option value="5" <?PHP if (!in_array("5", $avaliable_questions)) {echo "disabled='disabled'";} ?> >5</option>
							<option value="6" <?PHP if (!in_array("6", $avaliable_questions)) {echo "disabled='disabled'";} ?> >6</option>
							<option value="7" <?PHP if (!in_array("7", $avaliable_questions)) {echo "disabled='disabled'";} ?> >7</option>
							<option value="8" <?PHP if (!in_array("8", $avaliable_questions)) {echo "disabled='disabled'";} ?> >8</option>
							<option value="9" <?PHP if (!in_array("9", $avaliable_questions)) {echo "disabled='disabled'";} ?> >9</option>
							<option value="10" <?PHP if (!in_array("10", $avaliable_questions)) {echo "disabled='disabled'";} ?> >10</option>
							<option value="11" <?PHP if (!in_array("11", $avaliable_questions)) {echo "disabled='disabled'";} ?> >11</option>
							<option value="12" <?PHP if (!in_array("12", $avaliable_questions)) {echo "disabled='disabled'";} ?> >12</option>
							<option value="13" <?PHP if (!in_array("13", $avaliable_questions)) {echo "disabled='disabled'";} ?> >13</option>
							<option value="14" <?PHP if (!in_array("14", $avaliable_questions)) {echo "disabled='disabled'";} ?> >14</option>
							<option value="15" <?PHP if (!in_array("15", $avaliable_questions)) {echo "disabled='disabled'";} ?> >15</option>
							<option value="16" <?PHP if (!in_array("16", $avaliable_questions)) {echo "disabled='disabled'";} ?> >16</option>
							<option value="17" <?PHP if (!in_array("17", $avaliable_questions)) {echo "disabled='disabled'";} ?> >17</option>
							<option value="18" <?PHP if (!in_array("18", $avaliable_questions)) {echo "disabled='disabled'";} ?> >18</option>
							<option value="19" <?PHP if (!in_array("19", $avaliable_questions)) {echo "disabled='disabled'";} ?> >19</option>
							<option value="20" <?PHP if (!in_array("20", $avaliable_questions)) {echo "disabled='disabled'";} ?> >20</option>
							<option value="21" <?PHP if (!in_array("21", $avaliable_questions)) {echo "disabled='disabled'";} ?> >Seyirci</option>
						</select>
					</label>
					<input id="input" type="submit" name="submit" value="Delete selected question"></input>
				</form>
			</div>
		</div>
	</body>
</html>
