<!DOCTYPE html>
<html>
	<head>
		<title>Car</title>
	</head>
	<body>
		<h2>Car Registration Form</h2> <br><br>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			Regisration Number <br>
			<input type="text" name="reg_num"> <br><br>
			Model <br>
			<input type="text" name="model"> <br><br>
			Mileage <br>
			<input type="number" name="mileage"> <br><br>
			Color <br>
			<input type="text" name="color"> <br><br>
			Year of Registration <br>
			<input type="number" name="year"> <br><br>
			<input type="submit" name="register">
		</form>
		<br><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			Search <br>
			<input type="text" name="search_reg" placeholder="Registration Number"><br><br>
			<input type="submit" name="search">
		</form>
	</body>
</html>	

<?php

	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';
	$db = 'exam';

	$conn = mysql_connect($host,$user,$pwd);
	if(!$conn)
		die("Failed to connect".mysql_error());

	if(!mysql_select_db($db,$conn))
		die(mysql_error());

	if(isset($_POST['register']))
	{
		$reg_num =  $_POST['reg_num'];
		$model = $_POST['model'];
		$mileage = $_POST['mileage'];
		$color = $_POST['color'];
		$year = $_POST['year'];

		$insert = "INSERT INTO car VALUES('$reg_num','$model','$year','$color','$mileage')";

		$run_query = mysql_query($insert,$conn);

		if(!$run_query)
			echo "Failed to insert values\n";
	}

	else if(isset($_POST['search']))
	{
		$reg_num = $_POST['search_reg'];
		$search_query = "SELECT * FROM car WHERE reg_num='$reg_num'";
		$run_query = mysql_query($search_query,$conn);
		$res = mysql_fetch_assoc($run_query);
		$num_rows = mysql_num_rows($run_query);
		if($num_rows)
		{
			echo "\nRegistration Number : ".$res['reg_num'];
			echo "\nModel : ".$res['model'];
			echo "\nColor : ".$res['color'];
			echo "\nYear of Manufacture: ".$res['year'];
			echo "\nMileage : ".$res['mileage'];
		}
		else
		{
			echo "No records found !\n";
		}
	}
?>
