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
		<title>Modify Questions | Add</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/modify_questions_add.css">
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
					Add Question
				</p>
				<form name="add_event" method="post" action="create_question.php" autocomplete="off">
					<label id="question_number">
						<p id="text8">
							Question Number&#x3a;
						</p>
						<select id="select" type="select" name="question_ID">
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
					<label id="question">
						<p id="text9">
							Question&#x3a;
						</p>
						<textarea id="textinput" name="question"></textarea>
					</label>
					<label id="answer">
						<p id="text10">
							Answer&#x3a;
						</p>
						<textarea id="textinput1" name="answer"></textarea>
					</label>
					<label id="bonus">
						<input id="input" type="checkbox" name="bonus_or_not"></input>
						<p id="text11">
							Bonus Question
						</p>
					</label>
					<label id="type">
						<p id="text12">
							Type&#x3a;
						</p>
						<select id="select1" type="select" name="type">
							<option value="Normal" >Normal</option>
							<option value="Tarih/History" >Tarih/History</option>
							<option value="Coğrafya/Geography" >Coğrafya/Geography</option>
							<option value="Edebiyat/Literature" >Edebiyat/Literature</option>
							<option value="Dil/Language" >Dil/Language</option>
							<option value="Bilim/Science" >Bilim/Science</option>
							<option value="Spor/Sports" >Spor/Sports</option>
							<option value="Politika/Politics" >Politika/Politics</option>
							<option value="Ekonomi/Economics" >Ekonomi/Economics</option>
							<option value="Eğitim/Education" >Eğitim/Education</option>
							<option value="Sanat-Kültür/Art-Culture" >Sanat-Kültür/Art-Culture</option>
						</select>
					</label>
					<input id="input1" type="submit" value="Add Question"></input>
				</form>
			</div>
		</div>
	</body>
</html>


