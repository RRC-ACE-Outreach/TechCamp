### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 0: Before you Start
Setting up your virtual environment before Tech Camp Day	

### Welcome


**TODO: Notes from Andrea => This page needs to be developed.**
Goals: 
------
Get users onto Goorm IDE
Create a container
Launch the container
Install phpmyadmin
Install mysql
Validate phpmyadmin works

In all - the process may take around 20 minutes:

# Below notes were Copy-pasted from what was in the Web Dev notes:
### Getting our Toolkit Ready
We will be using a browser based IDE called Goorm.
Start by creating a user account for yourself on 
## https://ide.goorm.io/

Take a moment and get your user account created. Be careful to remember your login credentials, you will need them for TechCamp. 

**TODO: add screenshots**
**TODO: please make sure to number the steps so we

#### STEP 1
Choose: Create a new container

#### STEP 2
Configure your container. 
Name: Choose a name without offensive words as we will share our sites with other participants later.
Description: You can leave this blank
Region: Oregon (US)
Visibility: Public
Template: Default Template
Deployment: Not Used
GPU: No GPU core
Stack: PHP
Leave the checkboxes under the Stack menu **unchecked**.

**TODO: Add screenshot - andrea has a screenshot**

We are now ready to create the container.

**Press the Create Button**

This will take a minute or two for container creation.

#### STEP 3
When the container has been created, you'll see a screen stating:

**Container has been successfully created**

Press the button: "Run Container"
This will take a few moments to launch.

### Where do the files live?
In the PROJECT pane, expand the folder with your container name on it.

**TODO: insert screenshot.**


# Below notes were copy-pasted from Database notes
## Where we left off...
TODO: add instructions on using starter files if they got stuck in the last part.
We will continue with our solution that we started in Goorm.

### TODO: Instruct participants to stop the server. It might just be a simple one-line into the CLI


In the CLI - Copy paste this command, then press Enter/Return to run the command:
```
apt-get update
```

Then run this line:
```
apt-get install -y mysql-server
```

Start mysql by running this line:
```
service mysql start
```

Now we'ts install phpmyadmin by running this line:
```
apt-get install -y php7.3-mbstring php7.3-mysqli phpmyadmin
```

### When installing phpmyadmin, you'll be prompted for some questions to answer.

#### Question 1:
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

#### Question 2:
```
Configure database for phpmyadmin with dbconfig-common? [yes/no]

```

Enter Answer 2 into the command prompt:
```
yes
```
Press Enter/Return to accept.

#### Question 3:
* THIS IS VERY IMPORTANT THAT YOU ENTER A PASSWORD. DO NOT LEAVE IT BLANK. *
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

There is a little diagonal arrow in a box icon you can click to open the link in your web browser in a new tab.
Append this suffix to the URL to view phpmyadmin:
```
/phpmyadmin
```

Your URL should look something similar to this (this is not a real URL):
```
http://YourProjectName-nxyqj.run-us-west2.goorm.io/phpmyadmin/
```
Notice how you are not adding '/phpmyadmin' after your directory name. (Note to instructors - I have a feeling that we should we remove the directory/folder to simplify)



# TODO: modify instructions to help students and cover the following points
1. login to myphp
2. add a database
3. update the php files and create new php files
4. not in that order.

