<?php

	/*
		!!! zip should contain wp-* (wp-content for ex.) folders directly

		Name your zip as 'deploy.zip', then put it in target folder with this file,
		then go to http://yoursite/install.php, wait a bit and remove zip + this file
		after successfull unzip
	*/

	$zipArchive = new ZipArchive();
	$result = $zipArchive->open('deploy.zip');
	if ($result === TRUE) {
	    $zipArchive ->extractTo("./");
	    $zipArchive ->close();
	    
	    echo "Installed";
	} else {
	    echo "Install failed";
	}

?>
