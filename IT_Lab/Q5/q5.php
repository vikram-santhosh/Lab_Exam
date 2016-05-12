<!DOCTYPE html>
<html>
	<head>
		<title>Library</title>
	</head>
	<body>
		<h2>Library Database</h2><br><br>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Title <br>
			<input type="text" name="title"><br><br>
			Author <br>
			<input type="text" name="author"><br><br>
			ISBN <br>
			<input type="number" name="isbn"><br><br>
			Edition <br>
			<input type="number" name="edition"><br><br>
			<input type="submit" name="add"><br><br>
		</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			Search <br>
			<input type="text" name="title_search" placeholder="title"> <br><br>
			<input type="submit" name="search">
		</form>
	</body>
</html>

<?php
	$db = 'library';
	$host = 'localhost:3306';
	$user = 'root';
	$pwd = '';

	$conn = mysql_connect($host,$user,$pwd);
	if(!mysql_select_db($db))
		die(mysql_error());

	if(isset($_POST['add']))
	{
		$title = $_POST['title'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$isbn = $_POST['isbn'];

		$insert = "INSERT INTO cse_books VALUES('$title','$author','$edition','$isbn')";
		$run_query = mysql_query($insert);
		if(!$run_query)
			echo "Failed to insert values\n";
	}

	if(isset($_POST['search']))
	{
		$title = $_POST['title_search'];
		$query = "SELECT * FROM cse_books WHERE title='$title'";
		$run_query = mysql_query($query);
		$res = mysql_fetch_assoc($run_query);
		$num_rows = mysql_num_rows($run_query);

		if($num_rows)
		{
			echo "Title : ".$res['title']."<br>";
			echo "Author : ".$res['author']."<br>";
			echo "ISBN : ".$res['isbn']."<br>";
			echo "Edition : ".$res['edition']."<br>";
		}
		else
			echo "No records found !";
	}

?>