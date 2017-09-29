<?php
	require_once("data.php");
	require_once("../dbconnection.php");
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
			for($i = 0; $i < sizeof($data); $i++) {
				echo "<div class='article'>
					<h1 class='article-title'>" . $data[$i]["title"] ."</h1>
					<p class='article-message'>" . $data[$i]["message"] ."</p>
					<h2 class='article-author'>" . $data[$i]["author"] ."</h2>
				</div>";
			}
		?>

	</div>
</body>
</html>