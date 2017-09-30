<?php
	require_once("../dbconnection.php");

	if(isset($_POST['author']) && isset($_POST['title']) &&
	isset($_POST['message'])) { $query = $conn->prepare("INSERT INTO
	posts(title, author, message) VALUES (:title, :author, :message) ");

		$query->execute(array(
				"title" => $_POST['title'],
				"author" => $_POST['author'],
				"message" => $_POST['message']
			));
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<title>Filip Olofsson Blogg</title>
</head>
<body>
	<div class="main-wrapper">
		<div class="navbar">
			<a class="navbar-link" href="index.php">Blog Posts</a>
			<a class="navbar-link" href="newpost.php">New Blog Post</a>
		</div>
		
		<div class="article">
			<form method="POST" action="newpost.php" class="newpost-form">
				<input type="text" name="author" class="newpost-input" placeholder="Author...">
				<input type="text" name="title" class="newpost-input" placeholder="Title...">
				<textarea rows="5" id="input-message" name="message" class="newpost-input" placeholder="Message..."></textarea>
				<input type="submit" class="submit-button" value="Post">
			</form>
		</div>

	</div>
</body>
</html>