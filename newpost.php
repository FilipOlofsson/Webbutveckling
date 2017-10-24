<?php
	require_once("dbconnection.php");
	$message = "";

	if(isset($_POST['author']) && isset($_POST['title']) && isset($_POST['message'])) {

		$query = $conn->prepare("INSERT INTO posts(title, author, message) 
			VALUES (:title, :author, :message) ");

		try {
			$query->execute(array(
				"title" => $_POST['title'],
				"author" => $_POST['author'],
				"message" => str_replace("\n", "<br>", $_POST['message'])
			));
			$message = "Success!";
		} catch (Exception $e) {			// Har inte testat om den faktiskt fångar alla exceptions
			$message = "No Success!";		// men jag antar det, har inget bra sett att testa det på.
		}									// Eftersom att jag använder PDO::ERRMODE_EXCEPTION så borde
	}										// den kasta ett exception om något går fel.
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
			<a class="navbar-link" href="manage.php">Manage Posts</a>
		</div>
		
		<div class="article article-newpost">
		<h1 class="newpost-title">New Post</h1>
			<form method="POST" action="newpost.php" class="newpost-form">
				<label class="newpost-label">Author</label>
				<input type="text" name="author" class="newpost-input">
				<label class="newpost-label">Title</label>
				<input type="text" name="title" class="newpost-input">
				<label class="newpost-label">Message</label>
				<textarea rows="5" id="input-message" name="message" class="newpost-input"></textarea>
				<input type="submit" class="submit-button" value="Post">
				<?php
					if($message != "") {
						echo '<h2 class="newpost-status-message"> ' . $message . '</h2>';
					}
				?>
			</form>
		</div>

	</div>
</body>
</html>