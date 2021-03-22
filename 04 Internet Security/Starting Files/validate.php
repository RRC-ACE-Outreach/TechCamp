<?php
	require('connect_db.php');
	
	// Security Step 3 - Replace the 5 Lines Below
	if ($_POST) {
		$select_sql = "SELECT username FROM users WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "';";
		$statement = $db->prepare($select_sql);
		$statement->execute();
		$user = $statement->fetch();

		if ($user) {
			session_start();
			$_SESSION['username'] = $user['username'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Pokedex - Admin Validate</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
	<h1>Admin Validate</h1>
	<?php if ($user): ?>
		<p><b>Login was successful! Here are the details:</b></p>
		<p><b>SQL Statement:</b> <?= $select_sql ?></p>
		<p><b>What username did you enter?</b> <?= $_POST['username'] ?></p>
		<p><b>What password did you enter?</b> <?= $_POST['password'] ?></p>
		<p><b>Which login did these match?</b> <?= $user['username'] ?></p>
		<p><b>Who will I be from page to page?</b> <?= $_SESSION['username'] ?></p>
		<p><a href="index.php">Go to Front Page</a></p>
	<?php else: ?>
		<p>Username and Password combination does not exist.</p>
		<p><a href="index.php">Go back</a></p>
	<?php endif ?>
	</div>
</body>
</html>
