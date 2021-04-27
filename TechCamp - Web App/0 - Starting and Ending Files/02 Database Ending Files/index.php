
<!-- Security Step 1 - Paste Above -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pokedex</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
	<!-- Security Step 2 - Paste Below -->
	
		<h1>Add a New Pokemon</h1>
			<!--Insert Form Here -->
		<form method="post" action="#">
		    <div>
		      <label for="name">Name</label>
		      <input name="column1" id="column1">
		    </div>
		    <div>
		      <label for="name">Hit Points</label>
		      <input type="number" min="0" name="column2" id="column2" >
		    </div>
		    <div>
		      <label for="name">Attack</label>
		      <input type="number" min="0" name="column3" id="column3" >
		    </div>
		    <div>
		      <label for="name">Defense</label>
		      <input type="number" min="0" name="column4" id="column4" >
		    </div>
		    <div>
		      <label for="name">Speed</label>
		      <input type="number" min="0" name="column5" id="column5" >
		    </div>
		    <div>
		    	<label></label>
		      	<input type="submit" value="Create" />
		    </div>			
		</form>
		<h1>Pokedex Roll Call</h1>
		<ul>
			<!--Listing of pokemons -->
<?php
  //The 'connect_db.php' file contains code to connect to the database
  require('connect_db.php');


  // Check if create new record button was clicked. If it was, create an SQL insert statement to add
  //    the information entered on the form into the database.
  if ($_POST) {
    $insert_sql = "INSERT INTO db_table ( column1,  column2,  column3,  column4,  column5 )
                               VALUES  (:column1, :column2, :column3, :column4, :column5 )";
    $insert_statement  = $db->prepare($insert_sql);
    $insert_statement->execute($_POST);
  }


  // Using a SQL Select statement, get records from the table so they can be displayed on the form.
  $select_sql = 'SELECT * from db_table';
  $statement  = $db->prepare($select_sql);
  $statement->execute();
  $resultset   = $statement->fetchAll();
?>

<!-- The next three lines of code will cause all data in the table to be displayed on the form -->
<?php foreach($resultset as $dataset): ?>
	<!-- Security Step 4 - Replace Line Below -->
	<li><a href="detail.php?id=<?= $dataset['id'] ?>"><?= $dataset['column1'] ?></a></li>
<?php endforeach ?>

		</ul>
	</div>
</body>
</html>







