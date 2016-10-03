<!DOCTYPE html>
<html>
	<body>
	<?php
	$required = array('name', 'm_request');
	$error = false;
	foreach($required as $field) {
	if (empty($_POST[$field])) {
		$error = true;
		}
	}

	if ($error)
	{
		echo "<p align='center'>All fields are required.</p>";
		echo "<a href='movie_req.php'><p align='center'>Back...</p>";
	}
	else
	{
		echo "<p align='center'>Thank you for your response ".$_POST["name"]."</p>";
		echo "<a href='index.php'><p align='center'>Proceed...</p>";
		$file = 'data/movie_request.txt';
		$movie = $_POST["name"]." ".$_POST["m_request"]."\n";
		file_put_contents($file, $movie, FILE_APPEND | LOCK_EX);
	}
	?>
	</body>
</html>