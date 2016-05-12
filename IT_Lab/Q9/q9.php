<!DOCTYPE html>
<html>
	<head>
		<title>Admission</title>
	</head>
	<body>
		<h2>Student Admission</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Students securing S Grade in Java <br>
			<input type="submit" value="Go" name="s_grade"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Number of Students securing F Grade in Java <br>
			<input type="submit" value="Go" name="f_grade">
		</form>
	</body>
</html>

<?php
	$db = 'exam';
	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['s_grade']))
	{

		$query = "SELECT * FROM result WHERE sub='java' AND grade='S'";
		$run_query = mysql_query($query);
		while($res = mysql_fetch_assoc($run_query))
		{
			echo $res['name']."<br>";
		}
	}

	if(isset($_POST['f_grade']))
	{
		$query = "SELECT * FROM result WHERE sub='java' AND grade='F'";
		$run_query = mysql_query($query);
		$num = mysql_num_rows($run_query);
		echo $num;
	}

?>