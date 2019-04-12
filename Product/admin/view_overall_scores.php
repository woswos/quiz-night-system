<?PHP
	session_start();
	 
	include('../db_connect.php');
	 
	$login = $_SESSION['login'];
	 
	if(!isset($_SESSION['login'])||$_SESSION['login']!=1){
		header('location:sign_in.php');
	} 
	
	//get total number of groups
	$sql = "SELECT groups.group_name, total_scores.* FROM groups, total_scores WHERE groups.group_ID = total_scores.group_ID";
	$query = mysql_query($sql);
	$numrows = mysql_num_rows($query);
	
	for($group_ID = 1; $group_ID <= $numrows; $group_ID++){
		$sql = "SELECT * FROM total_scores WHERE group_ID='$group_ID'";
		$query = mysql_query($sql);
		
			//summing scores from each month to get total scores
			while($row = mysql_fetch_row($query)){
				$total = $row[1] + $row[2] + $row[3] + $row[4] + $row[5] + $row[6];
	
				$query = "UPDATE total_scores SET total='$total' WHERE group_ID='$group_ID'";
				mysql_query($query);
			}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Overall Scores</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/view_overall_scores.css">
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
				<a id="text2" href="view_overall_scores.php">
				View Overall Scores
				</a>
			</div>
			<div id="table" class="clearfix">
				<table>
					<tr >
						<th>Group Number</th>
						<th>Group Name</th>
						<th>December</th>
						<th>January</th>
						<th>February</th>
						<th>March</th>
						<th>April</th>
						<th>May</th>
						<th>Total</th>
					</tr>
					<?PHP
						$sql = "SELECT groups.group_name, total_scores.* FROM groups, total_scores WHERE groups.group_ID = total_scores.group_ID ORDER BY total DESC";
						$query = mysql_query($sql);
						while($row = mysql_fetch_row($query)){
							echo "
								<tr>
									<td>$row[1]</td> 
									<td>$row[0]</td>
									<td>$row[2]</td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>$row[5]</td>
									<td>$row[6]</td>
									<td>$row[7]</td>
									<td>$row[8]</td>
								</tr>
							";
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>


