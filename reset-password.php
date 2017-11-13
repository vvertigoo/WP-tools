<?php

	/*
		Put this file to site root folder and then go to http://yoursiteurl/reset-password.php
	*/

	define('WP_USE_THEMES', true);
	require ('wp-load.php');

	if(!empty($_POST)) {
		$username = $_POST["username"];
		$password = $_POST["new-password"];
		$wpdb->query( "UPDATE $wpdb->users SET user_pass = MD5('$password'), user_activation_key = '' WHERE user_login = '$username'" );

		echo 'Updated';
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset wp password</title>
</head>
<body>
	<h1>Reset wp password</h1>
	<form action="" method="POST">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="new-password" placeholder="New password">
		<button type="submit">Update</button>
	</form>
</body>
</html>
