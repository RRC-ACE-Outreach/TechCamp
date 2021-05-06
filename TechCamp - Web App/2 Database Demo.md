### Red River College's Applied Computer Education Department presents  
## Tech Camp, Stream 1
# Part 2: Adding a Database

<img src="0 - Images/02 Jigglypuff Database.png" alt="If its not in the database, did it really happen?">   

#### Follow along by video recordings on the Stream 1 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOmmyt8O3aTvsyM7iYDj5d-J" target="_blank">Red River College ACE's - YouTube channel</a>**.  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  
*A snippets only version of these notes exist here: [2 Database Snippets](/TechCamp%20-%20Web%20App/0%20-%20Snippets%20Only/2%20Database%20Snippets.md)*

### Where we left off...
In the previous module, you created a simple HTML page with CSS within the Goorm IDE.

### Where we are going...
In your running Goorm container, we will use phpMyAdmin to manage your database and we will add some code to connect your database to your HTML project.

### Did you have trouble completing the first module?
Have no fear. We have some starter files to help you along.
In your Goorm Project, you should already have the following two files:
```
index.php
styles.css
```

You can copy starter code from the below files, and then paste it into your Goorm container's project files:

1. [index.php](0%20-%20Starting%20and%20Ending%20Files/01%20Web%20Ending%20Files/index.php)
1. [styles.css](0%20-%20Starting%20and%20Ending%20Files/01%20Web%20Ending%20Files/styles.css)


### Last check before we dive in...
Before attending TechCamp, we asked for all participants to set up their virtual environment using [these instructions](0%20Before%20You%20Start%20Demo.md).

If you didn't set up your Goorm container before today - we ask you to walk through the rest of the setup steps 4 through 9 before continuing.

This may take 10-15 minutes.

When you're finished that, come back here and continue the Database demo.


# What is a database?
A database is a collection of well organized tables.

#### Here's an example of a table we might use to track our Pokemon:

| Name | Hit Points | Attack | Defense | Speed |
| --- | --- | --- | --- | --- |
| Pikachu | 35 | 55 | 40 | 90 |
| Eevee | 55 | 55 | 50 | 55 |
| Bulbasaur | 45 | 49 | 49 | 45 |
| Jigglypuff | 115 | 45 | 20 | 25 | 20 |

</br>
We use databases to save large amounts of complicated information, or information that we want to change quickly and easily.

So, what’s up with the list of items on your web pages? Can you add or change those items easily?

Not really, you need to edit your file every time you want to make some changes. We want to make this easier.

#### We need to build 4 things to make this work.
1. A web page – Hey we already built that!
1. A server to host your database
1. A database
1. Some programming code to connect the two together.

</br>

# Let's get your server running!
Remember when you set up your Goorm container, you installed an application called **phpMyAdmin**? We are going to use that to create your database.

Believe it or not, you created a server as part of your TechCamp setup. When you installed **phpMyAdmin** you also created an Apache server. *'Apache' is just the name of a type of server, not unlike the name of a type of mobile device, for example: Android or iOS.*

Your server supports **phpMyAdmin** by helping to connect your web page to a database. Its a sort of connector.

To be safe, let's make sure your server is running. You'll want to do this if you're coming back to your project after a long while or you have just relaunched your container.

Copy and paste then run this command in your Goorm Terminal:
```
service apache2 restart
```


# Let's start the app that will hold your database!
We are using an application called **mySQL** to hold and run your database. Because mySQL doesn't have a Graphical User Interface (GUI), a visual way to interact with the database, **phpMyAdmin** will give us GUI to interact with **mySQL**.

Let's make sure **mySQL** is running.  
Copy and paste then run this command in your Goorm Terminal:
```
service mysql start
```

## Wait! What even is SQL?
**SQL** stands for **'Structured Query Language'**. It is the language used to send commands to a **relational** (< that's a type) **database**.  


# We are ready to connect to phpMyAdmin
In your Goorm container, pick from the top menu:
```
Project
 > Running URL and Port
```
<img src="0 - Images/02 Open Running Port and URL.png" alt="Running URL and Port">

#### That will open window that looks like this:
<img src="0 - Images/02 Running URL.png" alt="Open the running URL">  
</br>  
</br>  
You'll see that a URL has been generated for your project. Select the icon pictured to open your project different browser tab/window, or copy/paste the url to do the same thing in a new tab/window.

Add the following text to the end of your URL:
```
/phpmyadmin
```

Your URL should look something like this:
```
mytechcamp-lbpaf.run-us-west2.goorm.io/phpmyadmin
```

You should be presented with a screen that looks like this:  
<img src="0 - Images/00 Welcome to phpMyAdmin.png" alt="phpMyAdmin starting page">

### Login to phpMyAdmin
Use the following credentials to login to phpMyAdmin:

**Username:**  
```
phpmyadmin
```

**Password:**  
```
root
```

### Select the **'Go'** button to login.  

We are now logged in!


# Let's create your database!
Select the 'Databases' link:  
<img src="0 - Images/02 phpMyAdmin Databases Link.png" alt="phpMyAdmin Databases Link">

Under 'Create Database':
- name your database: **techcamp**
- set the collation to: **utf_8bin**  

<img src="0 - Images/02 phpMyAdmin Create Database.png" alt="phpMyAdmin Create Database">  

**NOTE:** The database **Name** and **Collation** must match the notes exactly or your web page won’t be able to find the database.

### Select the **'Create'** button to create your database.
</br>  

We should see a brief green notification.

## Now we have a database.

**Do you remember...**  
Earlier, I mentioned that a database holds collections of tables? We now need to create your table in the database!


# Let’s create a table!
Click on the “SQL” link from the navigation bar:  
<img src="0 - Images/02 phpMyAdmin SQL link.png" alt="SQL link">  

Copy and then paste this script into the text area:
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

It should look something like this:  
<img src="0 - Images/02 phpMyAdmin SQL Script.png" alt="SQL Script and Go Button">  

Select the **Go** button when you are ready to send your script.
You should see a bunch of green success notifications.
In the sidebar, select the 'techcamp' link to see your database.  
<img src="0 - Images/02 phpMyAdmin SQL Success.png" alt="Successful SQL Notifications">  

Here, we can see the tables in the database.
Select the 'db_table' link:  
<img src="0 - Images/02 phpMyAdmin db_table.png" alt="Select the db_table link">  

If you see a warning message like this one, select 'ignore':  
<img src="0 - Images/02 phpMyAdmin ignore error sql.png" alt="Ignore the error message when viewing db_table">  

In this view, we can see the column names:
<img src="0 - Images/02 phpMyAdmin db_table columns.png" alt="Ignore the error message when viewing db_table">  


## We have a database and a table! Hurrah!
Now we just have to connect the web page to our database.  


# Let's connect our web page to the database!
*Remember - we go to the PROJECT pane and press the '+' icon to create new files.*

#### What even is PHP?
So far, we have been using phpMyAdmin to get your database set up, but what even is PHP?  
**PHP is code that can be added to an HTML file.**  
This type of code will let us perform more complicated actions such as connecting to a database.

## First, let's create **two** helper files.

#### FILE 1: A file to connect to the database
Create a new file and call it:
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

##### What is this file all about?
We put some hints into the snippets in the form of comments! Single-line PHP comments begin with two slashes '//' and are used to explain what the code around it does. We can see that this code is.

We can see that we defined some variables containing the database location, our username, and our password. We use those variables to pass into a 'PDO statement' to connect our page to our database. We call this a 'connection string'. We wrapped the statement in a 'try/catch' - which means, we try to run the statement. If it fails, we can catch the error so that we don't break our web page.



#### FILE 2: A new page to show (pokémon) details on your website
Create a new file and call it:
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
#### What is this file all about?
This page will display the details about database entries, or Pokémon, we have entered into the database. At the top of the file, we require the 'connect_db.php' file, because we need that connection to retrieve data from our database.

We prepared an 'SQL Select Statement', in other words ... we prepared a question, also known as a 'query', that we intend to ask the database. We can use the database response to fill fields that are labelled in the html beneath it. For example: '$pokemon['column1']' is intended to display the data of your pokemon that is stored in column1 of the database table.

## Next, Let's connect index.php to the database.
Open the **index.php** file.  
We are going to make some edits.

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

## Your database will now be connected to your web page.
Let's view your page. Open your page from Running Port and URL.

Hmm, there’s still nothing there.

The table is empty.

## Remember that form you created on your web page?
- Fill in the form.
- Click on the “Create” button.
- Do you see your new list item? Great!
- Now select the link on your new list item.
  - Surprise! We added an extra page called detail.php to display the extra information about your Pokémon.  


---
## That's all for Part 2: Adding a Database!

# Links
**Coming up: [Part 3: Networking](3%20Networking%20Demo.md)**  
**Return to [Web App Landing Page](../README.md)**
