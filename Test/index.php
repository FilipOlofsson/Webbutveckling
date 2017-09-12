<?php

require('../dbconnection.php');

if(isset($_POST['username']) && isset($_POST['password'])) {
	$stmt = $conn->prepare("
		INSERT INTO users (username, password) VALUES (:username, :password)
		");
	$stmt->bindParam(":username", $_POST['username']);
	$stmt->bindParam(":password", $_POST['password']);

	try {
		$stmt->execute();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html>
<body>
	<form method="POST">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit">
	</form>
</body>
</html>