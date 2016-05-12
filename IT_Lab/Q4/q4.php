<!DOCTYPE html>
<html>
	<head>
		<title>Admission</title>
	</head>
	<body>
		<h2>Student Admission</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Name <br>
			<input type="text" name="name"><br><br>
			USN <br>
			<input type="text" name="usn"><br><br>
			Branch <br>
			<input type="text" name="branch"><br><br>
			Mode of Admission <br>
			CET<input type="radio" value="cet" name="mode"><br>
			COMEDK<input type="radio" value="cet" name="mode"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Search <br>
			<input type="submit" name="search">
		</form>
	</body>
</html>

<?php
	$db = 'mydb';
	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['add']))
	{
		$name = $_POST['name'];
		$usn = $_POST['usn'];
		$branch = $_POST['branch'];
		$mode = $_POST['mode'];

		$insert = "INSERT INTO student VALUES('$name','$usn','$branch','$mode')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";
	}

	if(isset($_POST['search']))
	{
		$query = "SELECT * FROM student WHERE mode='cet' AND branch='cse'";
		$run_query = mysql_query($query);
		echo '<table>
				<tr>
					<th> Name </th>
					<th> USN </th>
				</tr>';
		while ($res = mysql_fetch_assoc($run_query))
		{
			echo '<tr>
					<td>'.$res["name"].'</td>
					<td>'.$res["usn"].'</td>
				  </tr>';
		}

		echo '</table>';
	}

?>