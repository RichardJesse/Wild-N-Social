<?php 

	$server = 'localhost';
	$dbuser = 'root';
	$dbpassword = '';
	$database = 'Wild-N-Social'; 

	$connect = mysqli_connect($server, $dbuser, $dbpassword, $database);
	if (!$connect) {
		echo "there was an error getting the connection";	

	} 
	




?>