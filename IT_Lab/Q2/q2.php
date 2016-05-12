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
			SSN <br>
			<input type="number" name="ssn"><br><br>
			Deptartment <br>
			<input type="text" name="dept"><br><br>
			Salary <br>
			<input type="number" name="salary"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Search <br>
			<input type="text" name="name_search" placeholder="Name"> <br><br>
			<input type="submit" name="search">
		</form>
	</body>
</html>

<?php
	$db = 'employee';
	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['add']))
	{
		$name = $_POST['name'];
		$ssn = $_POST['ssn'];
		$salary = $_POST['salary'];
		$dept = $_POST['dept'];

		$insert = "INSERT INTO emp VALUES('$name','$ssn','$dept','$salary')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";
	}

	if(isset($_POST['search']))
	{
		$name = $_POST['name_search'];
		$query = "SELECT * FROM emp WHERE name='$name'";
		$run_query = mysql_query($query);
		$res = mysql_fetch_assoc($run_query);
		$num_rows = mysql_num_rows($run_query);

		if($num_rows)
		{
			echo "Name : ".$res['name']."<br>";
			echo "SSN : ".$res['ssn']."<br>";
			echo "Deptartment : ".$res['dept']."<br>";
			echo "Salary : ".$res['salary']."<br>";
		}
		else
			echo "No records found !";
	}

?>