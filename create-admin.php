<?php

	/*
		Put this file to site root folder and then go to http://yoursiteurl/create-admin.php
	*/

	define('WP_USE_THEMES', true);
	require ('wp-load.php');

	if(!empty($_POST)) {
		$user = $_POST["username"];
		$email = $_POST["email"];
		$pass = $_POST["new-password"];

		if ( !username_exists( $user )  && !email_exists( $email ) ) {
			$user_id = wp_create_user( $user, $pass, $email );
			$user = new WP_User( $user_id );
			$user->set_role( 'administrator' );

			echo 'Created';
		}
		else {
			echo 'User exists';
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create new wp admin</title>
</head>
<body>
	<h1>Create new wp admin</h1>
	<form action="" method="POST">
		<input type="text" name="username" placeholder="Username">
		<input type="email" name="email" placeholder="Email">
		<input type="text" name="new-password" placeholder="Password">
		<button type="submit">Create</button>
	</form>
</body>
</html>
