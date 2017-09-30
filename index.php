<?php
	require_once("../dbconnection.php");

	$query = "SELECT title, author, message, date FROM posts ORDER BY id DESC";

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
		
		<?php
		$result = $conn->prepare($query);
		$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {	
				echo "<div class='article'>
					<h1 class='article-title'>" . $row['title'] ."</h1>
					<p class='article-message'>" . $row['message'] ."</p>
					<h2 class='article-author'>" . $row['author'] ." | " . $row['date'] . "</h2>
				</div>";
			}
		?>

	</div>
</body>
</html>