<?php
	try {
		$dbh = new PDO('mysql:dbname=geek;host=192.168.1.10', 'geek', 'geek');
	} catch (PDOException $e) {
		echo "Error: Could not connect. " . $e->getMessage();
	}
?>