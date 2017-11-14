<?php
	/*
		!!! This will work only if php script is allowed 

		Put this file to site root folder and then go to http://yoursiteurl/grep-seacrh.php
	*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search for string</title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="search" placeholder="Seacrh">
		<input type="text" name="path" placeholder="In path" value="./">
		<button type="submit">Go</button>
	</form>

	<?php

		if(!empty($_POST)){
			echo '<h3>Results:</h3>';
			echo '<ul>';

			$contents_list = array($_POST['search']);
			$path = $_POST['path'];
			$pattern = implode('\|', $contents_list) ;
			$command = "grep -r '$pattern' $path";
			$output = array();
			exec($command, $output);
			foreach ($output as $match) {
			    echo '<li>' . $match . '</li>';
			}

			echo '</ul>';
		}

	?>
</body>
</html>
