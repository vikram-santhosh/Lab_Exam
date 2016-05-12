<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
	</head>
	<body>
		<h2>Student Registration</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Name <br>
			<input type="text" name="name"><br><br>
			Username <br>
			<input type="text" name="user"><br><br>
			Password <br>
			<input type="password" name="pwd"><br><br>
			Confrim Password <br>
			<input type="password" name="cpwd"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
	</body>
</html>

<?php

	if(isset($_POST['add']))
	{
		$name = $_POST['name'];
		$user = $_POST['user'];
		$pwd = $_POST['pwd'];
		$cpwd = $_POST['cpwd'];

		if(empty($name))
			echo "Please enter a name <br>";
		else if(empty($user))
			echo "Please enter a username <br>";
		else if(empty($pwd))
			echo "Please enter a username <br>";
		else if(strcmp($cpwd,$pwd))
			echo "Re-entered password does match <br>";
		else 
			echo "Entry Added <br>";
	}

?>