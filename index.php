<?php

	require_once("dbconnection.php");

	$query = "SELECT id, title, author, message, date FROM posts ORDER BY id DESC";


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
		
		<?php
		$result = $conn->prepare($query);
		$result->execute();
		$count = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {	
				if($count == 0) {
					echo "<div class='article'>";
				} else {
					echo "<div class='article borders'>";
				}
				$message = str_replace('&lt;b&gt;', '<b>', htmlentities($row['message']));
				$message = str_replace('&lt;/b&gt;', '</b>', $message);
				$message = str_replace('\n', '&lt;br&gt;', $message);
				$message = str_replace('&lt;br&gt;', '<br>', $message);
				$id = htmlentities($row['id']);
				$date = htmlentities($row['date']);
				$author = htmlentities($row['author']);
				$title = htmlentities($row['title']);
				echo "<h1 class='article-title'>" . $title ."</h1>
					<h2 class='article-date'>" . "#" . $id . " | " . $date . "</h2>
					<p class='article-message'>" . $message ."</p>
					<h2 class='article-author'>" . $author . "</h2>
				</div>";
				$count++;
			}
		?>
	</div>
</body>
</html>