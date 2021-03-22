<?php
  //The 'connect_db.php' file contains code to connect to the database
  require('connect_db.php');

  //Execute a SQL select statement to get all information from the table
  $select_sql = 'SELECT * from db_table WHERE id = :id';
  $statement  = $db->prepare($select_sql);
  $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $statement->execute();
  $pokemon    = $statement->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pokedex</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
		<h1>Pokemon - <?= $pokemon['column1'] ?></h1>
		<form method="post" action="#">
		    <div>
		      <label for="name">Name</label>
		    	<?= $pokemon['column1'] ?>
		    </div>
		    <div>
		      <label for="name">Hit Points</label>
		      <?= $pokemon['column2'] ?>
		    </div>
		    <div>
		      <label for="name">Attack</label>
		      <?= $pokemon['column3'] ?>
		    </div>
		    <div>
		      <label for="name">Defense</label>
		      <?= $pokemon['column4'] ?>
		    </div>
		    <div>
		      <label for="name">Speed</label>
		      <?= $pokemon['column5'] ?>
		    </div>
		    <div>
		    	Back to <a href="index.php">home page</a>
		    </div>
		</form>
	</div>
</body>
</html>







