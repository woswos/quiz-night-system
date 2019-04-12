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
		<title>Live Scores</title>
		<link rel="stylesheet" href="../admin/css/boilerplate.css">
		<link rel="stylesheet" href="../admin/css/present_live_scores.css">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
		<meta http-equiv="refresh" content="3">
	</head>
	<body>
		<div id="primaryContainer" class="primaryContainer clearfix">
			<div id="table" class="clearfix" >
				<table>
					<tr >
						<th>Group Number</th>
						<th>Group Name</th>
						<th>1</th>
						<th>2</th>
						<th>3</th>
						<th>4</th>
						<th>5</th>
						<th>6</th>
						<th>7</th>
						<th>8</th>
						<th>9</th>
						<th>10</th>
						<th>11</th>
						<th>12</th>
						<th>13</th>
						<th>14</th>
						<th>15</th>
						<th>16</th>
						<th>17</th>
						<th>18</th>
						<th>19</th>
						<th>20</th>
						<th>Total</th>
					</tr>
					<?PHP
						$sql = "SELECT groups.group_name, temp_scores.* FROM groups, temp_scores WHERE groups.group_ID = temp_scores.group_ID";
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
									<td>$row[9]</td>
									<td>$row[10]</td>
									<td>$row[11]</td>
									<td>$row[12]</td>
									<td>$row[13]</td>
									<td>$row[14]</td>
									<td>$row[15]</td>
									<td>$row[16]</td>
									<td>$row[17]</td>
									<td>$row[18]</td>
									<td>$row[19]</td>
									<td>$row[20]</td>
									<td>$row[21]</td>
									<td>$row[22]</td>
								</tr>
							";
						}
						?>
				</table>
			</div>
		</div>
	</body>
</html>


