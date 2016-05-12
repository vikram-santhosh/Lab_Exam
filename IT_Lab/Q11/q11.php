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
			Gender <br>
			Male <input type="radio" name="gender" value="m">
			Female <input type="radio" name="gender" value="f"><br><br>
			Age <br>
			<input type="number" name="age"><br><br>
			<input type="submit" name="add"><br><br>
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
		$gender = $_POST['gender'];
		$age = $_POST['age'];

		$insert = "INSERT INTO tb VALUES('$name','$gender','$age')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";

	if($age>30 && !strcmp($gender,"m"))
		echo "Namaste Uncle ".$name."<br>";
	if($age>30 && !strcmp($gender,"f"))
		echo "Namaste Aunty ".$name."<br>";
	if($age<30)
		echo "Hi ".$name."<br>";

	}

?>