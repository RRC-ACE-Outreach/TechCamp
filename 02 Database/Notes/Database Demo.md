### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 2: Adding a Database

# Where we left off
TODO: add instructions on using starter files if they got stuck in the last part.
We will continue with our solution that we started in Goorm.

### TODO: Instruct participants to stop the server. It might just be a simple one-line into the CLI


In the CLI - Copy paste this command, then press Enter/Return to run the command:
```
service mysql start
```

```
apt-get install -y php7.3-mbstring php7.3-mysql phpmyadmin
```

You will be prompted to answer a few questions during the installation.
Question 1:
```
Please choose the web server that should be automatically configured to run phpMyAdmin.
  1. apache2  2. lighttpd
```

Enter Answer 1 into the command prompt:
```
1
```
Press Enter/Return to accept.
NOTE: This will take some time for your container to install phpmyadmin

Question 2:
```
Configure database for phpmyadmin with dbconfig-common? [yes/no]

```

Enter Answer 2 into the command prompt:
```
yes
```
Press Enter/Return to accept.

Question 3:
```
Please provide a password for phpmyadmin to register with the database server. If left blank, a random password will be generated.
MySQL application password for phpmyadmin:
```

Enter Answer 3 into the command prompt (use this password for this TechCamp for ease of following along):
```
root
```
Press Enter/Return to accept. Enter the same password again when prompted for confirmation.

NOTE: I'm not sure what to do if the user presses enter instead of entering the first password.

#### Restart your server
```
service apache2 restart
```
Press Enter/Return to accept.

### Configure MySQL
In the CLI - Copy paste this command to run MySQL, then press Enter/Return to run the command:
```
mysql
```

In the CLI - Copy paste this command to grant privileges, then press Enter/Return to run the command:
```
GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost' WITH GRANT OPTION;
```

Let's finish up. Send the following command in the CLI to close MySQL, then press Enter/Return to run the command:
```
exit
```

Let's restart the Apache web server:
```
service apache2 restart
```

### We are ready to view your project via /phpmyadmin
Login to PhpMyAdmin at your project link. 
TODO: add instructions on getting to project link and how to add suffix /phpmyadmin

From the top menu, select "PROJECT" and then pick "Running URL and Port" from the menu.

TODO: add screenshots
Copy the URL under "Registered URL and Port".

Paste the URL into a new tab/window in your browser.
Click on your project folder name (link)


# Sample  
Sample text. Inline code ref: `<h1>`.
```html
<h1>Add a New Pokemon</h1>
```


### COPYING TO WEB
You should already have these files:
```
index.php
```
```
style.css
```

#### We will create following files - or create new files
*Remember - we go to the PROJECT pane and press the '+' icon.*

#### A file to connect to the database:
```
connect_db.php
```

Copy and Paste this starting snippeg to connect_db.php
``` php
<?php
    //Define variables needed to connect to the MySQL database
    define('DB_DSN', 'mysql:host=localhost;dbname=techcamp;charset=utf8');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    //Connect to the database. If the connection fails the main form will not display
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        die(); // Force execution to stop on errors.
    }
?>
```

#### A new page for details on your website:
```
detail.php
```

Copy and Paste this starting snippeg to detail.php
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

#### Let's create tables in your database:
```
db_table_create.sql
```
TODO: add the snippet here for db creation to put into phpmyadmin

# WHAT IS A DATABASE?
A database is a collection of well organized lists. 

We use databases to save large amounts of complicated information, or information that we want to change quickly and easily.
So what’s up with the list of items on your web pages? Can you add or change those items easily?
Not really, you need to edit your file every time you want to make some changes. We want to make this easier.
We need to build 3 things to make this work.
1. A web page – Hey we already built that!
1. A database
1. Some programming code to connect the two together.

# Let's add mySQL and phpMyAdmin to your Goorm container
TODO: add command line functions to add phpmyadmin and mysql to goorm container

## 


• Sign in to MySQL
o username: root
o no password
o click Login button
You should see this screen:
• Let’s create a database
o click on “Create new database”
o text box (this is the database name): techcamp
o collation: utf8_bin
Database Name and Collation must match the notes exactly or your web page won’t be able to find the database.
o click on the Save button
o should get a green message:
Now we have a database.
A database is just a container for our lists.
The lists are called tables.
Now let’s create a table.
• Click on “SQL Command”
• Open db_table_create.sql in the text editor
• Copy and paste all of the text to the SQL Command window
• Click on the EXECUTE button
• You should see a series of green success messages. Yay!!
• click on techcamp at the top
o you can see the tables in the database
• click on db_table
o you can see the column names
We have a database and a table! Hurrah!
Now we just have to connect the web page to our database
We do that by adding some new code to the web page
PHP
PHP is code that can be added to an HTML file.
This new kind of code will let us perform more complicated actions such as connecting to a database.
• Find your copy of index.html
• Rename it to index.php
• Open a browser window
• in the address line type: localhost/index.php
• There’s your form
• Open index.php in a text editor
We’re going to replace the list you created with a list of information from the database.
• Find your list of Pokémon (a group of <li> tags) and delete them.
o Do not delete the <ul> </ul> tags
• Save the file and refresh the page. There’s nothing there.
• Open php1.txt
o Copy everything from this file.
o Paste the text between the <ul> and </ul> tags.
• Refresh the page.
There’s still nothing there. The table is empty. Remember that form you created on your web page?
• Fill in the form. Click on the “Create” button.
• Do you see your new list item? Great! Now double-click on it.
o Surprise! We added an extra page called detail.php to display the extra information about your Pokémon.
BEFORE YOU GO
Let’s save your files.
All the work you have done in this session should be in:
Desktop\zwamp\vdrive\web
• Use Windows Explorer to find this folder.
• Copy and paste all of the files in this folder to:
o Flash Drive\02 Database\My Files
