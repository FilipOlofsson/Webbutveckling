<?php

	require_once("dbconnection.php");

	$query = "SELECT id, title, author, date FROM posts ORDER BY id DESC";


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<title>Filip Olofsson Blogg</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        	$("#submitBtn").click(function() {
                $.ajax({
	                type: "get",
	                url: "deletepost.php",
	                data: "id=" + $.attr(this, 'postid'),
	                datatype: 'json'
            	});
            	location.reload()
        	return false;
        	});
        });
	</script>
</head>
<body>
	<div class="main-wrapper">
		<div class="navbar">
			<a class="navbar-link" href="index.php">Blog Posts</a>
			<a class="navbar-link" href="newpost.php">New Blog Post</a>
			<a class="navbar-link" href="manage.php">Manage Posts</a>
		</div>
		<div class="manage-posts-container">
			<h1 class="newpost-title">Manage Existing Posts</h1>
			<table class="manage-table">
			<?php
				$result = $conn->prepare($query);
				$result->execute();
				$count = 0;
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					echo "
					<tr>
						<th class='table-info'>" . htmlentities($row['title']) . "</th>
						<th class='table-info'>" . htmlentities($row['author']) . "</th>
						<th class='table-info'>" . htmlentities($row['date']) . "</th>
						<th><form ><div class='delete-post-button' postid='" . htmlentities($row['id']) . "' id='submitBtn'>Delete</div></th>
					</tr>
					";
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>