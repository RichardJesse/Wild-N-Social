<?php
$host = "localhost";
$user = "root"; //edit if you have set a username for MySQL
$pass = ""; // edit if you have set a password
$name = "event_org";

// Create connection syntax
$conn = new mysqli($host, $user, $pass, $name);
// Check connection
if($conn == TRUE){
	echo "Connection succesful";
}

else if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>