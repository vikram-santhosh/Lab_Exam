<!DOCTYPE html>
<html>
	<head>
		<title>Employee</title>
	</head>
	<body>
		<h2>Employee Database</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Name <br>
			<input type="text" name="name"><br><br>
			USN <br>
			<input type="text" name="usn"><br><br>
			Age <br>
			<input type="number" name="age"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Search <br>
			<input type="text" name="name_search" placeholder="Name"> <br><br>
			<input type="submit" name="vote">
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
		$age = $_POST['age'];

		$insert = "INSERT INTO std VALUES('$name','$usn','$age')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";
	}

	if(isset($_POST['vote']))
	{
		$name = $_POST['name_search'];
		$query = "SELECT * FROM std WHERE name='$name'";
		$run_query = mysql_query($query);
		$res = mysql_fetch_assoc($run_query);

		$age = $res['age'];
		$name = $res['name'];

		if($age>18)
			echo $name." is eligible to vote !";
		else
			echo $name." not is eligible to vote !";
	}

?>