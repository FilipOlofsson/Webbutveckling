<?php

	/* 
		Roliga saker att göra om jag får tid:

		Bättre formatering på message, den hanterar inte line breaks så som den är nu.
		kan säkert fixa det nu men någonting måste man ha kvar att göra på lektionen.

		Ändra encodingen på databasen för att förhindra vissa SQLi som involverar enkodningen av characters.

		Färgerna, känns som att något är "fel" med bakgrundsfärgen, typ som att den är för ljus.

		Uppdaterad 2017-09-30 18:15 

	*/

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
		</div>
		
		<?php
		$result = $conn->prepare($query);
		$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {	
				echo "<div class='article'>
					<h2 class='article-date'>" . "#" . addslashes(htmlentities($row['id'])) . " | " . addslashes(htmlentities($row['date'])) . "</h2>
					<h1 class='article-title'>" . addslashes(htmlentities($row['title'])) ."</h1>
					<p class='article-message'>" . addslashes(htmlentities($row['message'])) ."</p>
					<h2 class='article-author'>" . addslashes(htmlentities($row['author'])) . "</h2>
				</div>";
			}
		?>

	</div>
</body>
</html>