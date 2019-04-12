<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	}
	
	//getting variables
	$group_ID = $_POST['group_ID'];
	$group_name = $_POST['group_name'];
	$grade_12 = $_POST['grade_12'];
	$grade_11 = $_POST['grade_11'];
	$grade_10 = $_POST['grade_10'];
	$grade_9 = $_POST['grade_9'];
	$prep = $_POST['prep'];
	$teacher_personnel = $_POST['teacher_personnel'];
	$extra = $_POST['extra'];
	
	/*
	echo $group_ID;
	echo '<br>';
	echo $group_name;
	echo '<br>';
	echo $grade_12;
	echo '<br>';
	echo $grade_11;
	echo '<br>';
	echo $grade_10;
	echo '<br>';
	echo $grade_9;
	echo '<br>';
	echo $prep;
	echo '<br>';
	echo $teacher_personnel;
	echo '<br>';
	echo $extra;
	*/
	
	
	$sql = "SELECT * FROM groups WHERE group_ID = '$group_ID'";
	
	$result = mysql_query($sql);
	
	$numrows = mysql_num_rows($result);
	
	//deciding to update or insert a question
	if($numrows > 0){
	
		//getting previous password and connection state
		$sql = "SELECT password, connected FROM groups WHERE group_ID = '$group_ID'";
		$query = mysql_query($sql);
		while($row = mysql_fetch_row($query)){
			$password = $row[0];
			$connected = $row[1];
		}
	
		//updating the information
		$query = "UPDATE groups SET group_ID = '$group_ID', group_name = '$group_name', grade_12 = '$grade_12', grade_11 = '$grade_11', grade_10 = '$grade_10', grade_9 = '$grade_9', prep = '$prep', teacher_personnel = '$teacher_personnel', extra = '$extra', password = '$password', connected = '$connected' WHERE group_ID = '$group_ID'";
		mysql_query($query);
	
		echo "Group is successfully updated!";
	
	}
	else{
		$query = "INSERT INTO  groups (group_ID, group_name, grade_12, grade_11, grade_10, grade_9, prep, teacher_personnel, extra) VALUES ('$group_ID', '$group_name', '$grade_12', '$grade_11', '$grade_10', '$grade_9', '$prep', '$teacher_personnel', '$extra')";
		mysql_query($query);
	
		echo "Group is successfully added!";
	}
	
?>

<HTML>
	<head>
		<link rel="shortcut icon" >
		<meta http-equiv='REFRESH' content='1;url=modify_groups.php'>
	</head>
</HTML>


