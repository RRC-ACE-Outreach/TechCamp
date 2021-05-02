### Red River College's Applied Computer Education Department presents
## Tech Camp
# Part 2: Adding a Database.  
# SNIPPETS ONLY VERSION

## Make sure your server is running
Restart your server
```
service apache2 restart
```

Start mysql service
```
service mysql start
```

## Access phpMyAdmin
Your URL should look something like this:
```
mytechcamp-lbpaf.run-us-west2.goorm.io/phpmyadmin
```

## phpMyAdmin login credentials:

**Username:**
```
phpmyadmin
```

**Password:**
```
root
```

## Table creation script
``` sql
USE techcamp;

DROP TABLE IF EXISTS db_table;

CREATE TABLE db_table (
    id 		int(11)			NOT NULL	AUTO_INCREMENT
  , column1	varchar(255)	NOT NULL
  , column2	varchar(255)	NOT NULL
  , column3	varchar(255)	NOT NULL
  , column4	varchar(255)	NOT NULL
  , column5	varchar(255)	NOT NULL
  , PRIMARY KEY(id)
);
```

## FILE 1: connect_db.php
```
connect_db.php
```

Copy and Paste this starting snippet to connect_db.php
``` php
<?php
    // Define variables needed to connect to the MySQL database
    define('DB_DSN', 'mysql:host=localhost;dbname=techcamp;charset=utf8');
    define('DB_USER', 'phpmyadmin');
    define('DB_PASS', 'root');

    // Connect to the database. If the connection fails the main form will not display
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        die(); // Force execution to stop on errors.
    }
?>
```

## FILE 2: detail.php
```
detail.php
```

Copy and paste this starting snippet to detail.php
``` php
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
```

## Update index.php
Let's replace the list you created in **index.php**. Careful, replace the `<li>` elements only:
``` php
<!--Listing of pokemons -->
<li>Pikachu</li>
<li>Eevee</li>
```

Replace with this list of information from the database.
``` php
<?php
  //The 'connect_db.php' file contains code to connect to the database
  require('connect_db.php');


  // Check if create new record button was clicked.
  // If it was, create an SQL insert statement to add -
  // - the information entered on the form into the database.
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

  <!-- Hey! If you are reading this comment,
  your <li> elements will get added to your page using the line below -->
	<li><a href="detail.php?id=<?= $dataset['id'] ?>"><?= $dataset['column1'] ?></a></li>
<?php endforeach ?>
```

---
### That's all for Part 2: Databases SNIPPETS ONLY VERSION!
# Links
**Return to [Part 2: Databases full notes](../2%20Database%20Demo.md)**  
**Coming up: [Part 3: Networking](3%20Networking%20Demo.md)**  
**Return to [Web App Landing Page](README.md)**
