<?php
	session_start();
	
	if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Pokedex - Admin Login</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
  <h1>Admin Login</h1>
  <form action="validate.php" method="post">
    <div>
      <label for="username">Name</label>
      <input name="username" id="username" required>
    </div>
    <div>
      <label for="password">Password</label>
      <input name="password" id="password" required>
    </div>
    <div>
      <input type="submit" value="login">
    </div>
  </form>
  </div>
</body>
</html>
<?php
		exit();
	}
?>