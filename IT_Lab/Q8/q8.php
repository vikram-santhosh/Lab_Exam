<!DOCTYPE html>
<html>
	<head>
		<title>Moive</title>
	</head>
	<body>
		<h2>Movie Database</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Title <br>
			<input type="text" name="title"><br><br>
			Genre <br>
			<input type="text" name="genre"><br><br>
			Actor <br>
			<input type="text" name="actor"><br><br>
			Budge <br>
			<input type="number" name="budget"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Search <br>
			<input type="text" name="title_search" placeholder="Title"> <br><br>
			<input type="submit" name="search">
		</form>
	</body>
</html>

<?php
	$db = 'movie';
	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['add']))
	{
		$title = $_POST['title'];
		$actor = $_POST['actor'];
		$genre = $_POST['genre'];
		$budget = $_POST['budget'];

		$insert = "INSERT INTO tb VALUES('$title','$actor','$genre','$budget')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";
	}

	if(isset($_POST['search']))
	{
		$title = $_POST['title_search'];
		$query = "SELECT * FROM tb WHERE title='$title'";
		$run_query = mysql_query($query);
		$res = mysql_fetch_assoc($run_query);
		$num_rows = mysql_num_rows($run_query);

		if($num_rows)
		{
			echo "Title : ".$res['title']."<br>";
			echo "Actor : ".$res['actor']."<br>";
			echo "Genre : ".$res['genre']."<br>";
			echo "Budget : ".$res['budget']."<br>";
		}
		else
			echo "No records found !";
	}

?>