<?php
	require_once("dbconnection.php");
	try {
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$query = $conn->prepare("DELETE FROM posts WHERE id=:id");
			$query->bindParam(":id", $id);
			$query->execute();
		}
	} catch(Exception $e) {
			echo $e;
	}
?>