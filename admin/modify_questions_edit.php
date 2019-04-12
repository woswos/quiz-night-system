<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	$select_state = "disabled='disabled'";
	
	//select a question to edit
	if(isset($_POST['submit'])){
		
		$select_state = ' ';
	
		$selected = $_POST['question_ID_selected'];
	
		$sql = "SELECT * FROM questions WHERE question_ID = '$selected'";
	
		$query = mysql_query($sql);
		while($row = mysql_fetch_row($query)){
			$question_ID = $row[0];
			$question = $row[1];
			$answer = $row[2];
			$bonus_or_not = $row[3];
			$type = $row[4];
		}
		
		if($bonus_or_not == 1){
			$checked_or_not = "checked='checked'";
		}else{
			$checked_or_not = " ";
		}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modify Questions | Edit</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_questions_edit.css">
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
					Edit Question
				</p>
				<form name="select" action="" method="post" autocomplete="off">
					<label id="initial_question_number">
						<p id="text8">
							Select a question to edit&#x3a;
						</p>
						<select id="select" type="select" name="question_ID_selected" >
							<option value="1" >1</option>
							<option value="2" >2</option>
							<option value="3" >3</option>
							<option value="4" >4</option>
							<option value="5" >5</option>
							<option value="6" >6</option>
							<option value="7" >7</option>
							<option value="8" >8</option>
							<option value="9" >9</option>
							<option value="10" >10</option>
							<option value="11" >11</option>
							<option value="12" >12</option>
							<option value="13" >13</option>
							<option value="14" >14</option>
							<option value="15" >15</option>
							<option value="16" >16</option>
							<option value="17" >17</option>
							<option value="18" >18</option>
							<option value="19" >19</option>
							<option value="20" >20</option>
							<option value="21" >Seyirci</option>
						</select>
					</label>
					<input id="input" type="submit" name="submit" value="Select"></input>
				</form>
				<form name="save" action="create_question.php" method="post" autocomplete="off">
					<label id="question_number">
						<p id="text9">
							Question Number&#x3a;
						</p>
						<select id="select1" type="select" name="question_ID">
							<option value="1" <?PHP if($question_ID == 1) { echo "selected='yes'"; } ?> >1</option>
							<option value="2" <?PHP if($question_ID == 2) { echo "selected='yes'"; } ?> >2</option>
							<option value="3" <?PHP if($question_ID == 3) { echo "selected='yes'"; } ?> >3</option>
							<option value="4" <?PHP if($question_ID == 4) { echo "selected='yes'"; } ?> >4</option>
							<option value="5" <?PHP if($question_ID == 5) { echo "selected='yes'"; } ?> >5</option>
							<option value="6" <?PHP if($question_ID == 6) { echo "selected='yes'"; } ?> >6</option>
							<option value="7" <?PHP if($question_ID == 7) { echo "selected='yes'"; } ?> >7</option>
							<option value="8" <?PHP if($question_ID == 8) { echo "selected='yes'"; } ?> >8</option>
							<option value="9" <?PHP if($question_ID == 9) { echo "selected='yes'"; } ?> >9</option>
							<option value="10" <?PHP if($question_ID == 10) { echo "selected='yes'"; } ?> >10</option>
							<option value="11" <?PHP if($question_ID == 11) { echo "selected='yes'"; } ?> >11</option>
							<option value="12" <?PHP if($question_ID == 12) { echo "selected='yes'"; } ?> >12</option>
							<option value="13" <?PHP if($question_ID == 13) { echo "selected='yes'"; } ?> >13</option>
							<option value="14" <?PHP if($question_ID == 14) { echo "selected='yes'"; } ?> >14</option>
							<option value="15" <?PHP if($question_ID == 15) { echo "selected='yes'"; } ?> >15</option>
							<option value="16" <?PHP if($question_ID == 16) { echo "selected='yes'"; } ?> >16</option>
							<option value="17" <?PHP if($question_ID == 17) { echo "selected='yes'"; } ?> >17</option>
							<option value="18" <?PHP if($question_ID == 18) { echo "selected='yes'"; } ?> >18</option>
							<option value="19" <?PHP if($question_ID == 19) { echo "selected='yes'"; } ?> >19</option>
							<option value="20" <?PHP if($question_ID == 20) { echo "selected='yes'"; } ?> >20</option>
							<option value="21" <?PHP if($question_ID == 21) { echo "selected='yes'"; } ?> >Seyirci</option>
						</select>
					</label>
					<label id="question">
						<p id="text10">
							Question&#x3a;
						</p>
						<textarea id="textinput" name="question" ><?PHP echo $question; ?></textarea>
					</label>
					<label id="answer">
						<p id="text11">
							Answer&#x3a;
						</p>
						<textarea id="textinput1" name="answer" ><?PHP echo $answer; ?></textarea>
					</label>
					<label id="bonus">
						<input id="input1" type="checkbox" name="bonus_or_not" <?PHP echo $checked_or_not; ?> ></input>
						<p id="text12">
							Bonus Question
						</p>
					</label>
					<label id="type">
						<p id="text13">
							Type&#x3a;
						</p>
						<select id="select2" type="select" name="type">
							<option value="Normal" <?PHP if($type == "Normal") { echo "selected='yes'"; } ?> >Normal</option>
							<option value="Tarih/History" <?PHP if($type == "Tarih/History") { echo "selected='yes'"; } ?> >Tarih/History</option>
							<option value="Coğrafya/Geography" <?PHP if($type == "Coğrafya/Geography") { echo "selected='yes'"; } ?> >Coğrafya/Geography</option>
							<option value="Edebiyat/Literature" <?PHP if($type == "Edebiyat/Literature") { echo "selected='yes'"; } ?> >Edebiyat/Literature</option>
							<option value="Dil/Language" <?PHP if($type == "Dil/Language") { echo "selected='yes'"; } ?> >Dil/Language</option>
							<option value="Bilim/Science" <?PHP if($type == "Bilim/Science") { echo "selected='yes'"; } ?> >Bilim/Science</option>
							<option value="Spor/Sports" <?PHP if($type == "Spor/Sports") { echo "selected='yes'"; } ?> >Spor/Sports</option>
							<option value="Politika/Politics" <?PHP if($type == "Politika/Politics") { echo "selected='yes'"; } ?> >Politika/Politics</option>
							<option value="Ekonomi/Economics" <?PHP if($type == "Ekonomi/Economics") { echo "selected='yes'"; } ?> >Ekonomi/Economics</option>
							<option value="Eğitim/Education" <?PHP if($type == "Eğitim/Education") { echo "selected='yes'"; } ?> >Eğitim/Education</option>
							<option value="Sanat-Kültür/Art-Culture" <?PHP if($type == "Sanat-Kültür/Art-Culture") { echo "selected='yes'"; } ?> >Sanat-Kültür/Art-Culture</option>
						</select>
					</label>
					<input id="input2" type="submit" value="Save Question" <?PHP echo $select_state; ?> ></input>
				</form>
			</div>
		</div>
	</body>
</html>


