<?php
$server = "localhost";
$user = "user";
$pass = "abc12345";
$dbname = "Blog";

try {
	$conn = new PDO("mysql:host=$server;dbname=$dbname;", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
}

?>
