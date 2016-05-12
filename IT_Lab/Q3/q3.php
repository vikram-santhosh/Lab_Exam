<!DOCTYPE html>
<html>
	<head>
		<title>College</title>
	</head>
	<body>
		<h2>College Forum</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Display students with CGPA below 9.0 <br><br>
			<input value="Go" type="submit" name="show"><br><br><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Update CGPA for enteries where name is John <br><br>
			<input value="Go" type="submit" name="update"><br><br><br><br>
		</form>
	</body>
</html>

<?php 

	$db = 'college';
	$user = 'root';
	$pwd = '';
	$host = 'localhost:3306';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['show']))
	{
		$query = "SELECT * FROM student WHERE CGPA<9.0";
		$run_query = mysql_query($query);
		echo '<table>
				<tr>
					<th>Name</th>
					<th>CGPA</th>
				</tr>';
		while($res = mysql_fetch_assoc($run_query))
		{
			echo '<tr>
					<td>'.$res["name"].'</td>
					<td>'.$res["CGPA"].'</td>
				 </tr>';
		}
		echo '</table>';
	}

	if(isset($_POST['update']))
	{
		$update_query = "UPDATE student set CGPA='9.4' WHERE name='john' AND CGPA='8.96'";
		$run_update_query = mysql_query($update_query);

		if(!$run_update_query)
			echo "Failed to update !";
		$select_query = "SELECT * FROM student WHERE name='john'";
		$run_select_query = mysql_query($select_query);

		if($run_select_query)
		{
			echo '<table>
					<tr>
						<th>Name</th>
						<th>CGPA</th>
					</tr>';
			while($res = mysql_fetch_assoc($run_select_query))
			{
				echo '<tr>
						<td>'.$res["name"].'</td>
						<td>'.$res["CGPA"].'</td>
					 </tr>';
			}
			echo '</table>';
		}
		else
			echo "No records found !";
	}
?>