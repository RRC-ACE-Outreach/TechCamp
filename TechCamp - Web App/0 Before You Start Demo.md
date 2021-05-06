### Red River College's Applied Computer Education Department presents  
## Tech Camp, Stream 1
# Part 0: Before you Start

#### Follow along by video recordings on the Stream 1 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOmmyt8O3aTvsyM7iYDj5d-J" target="_blank">Red River College ACE's - YouTube channel</a>**.  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  

# Let's set up your virtual environment before TechCamp Day!
All steps in this process process may take around 20 minutes.
**NOTE:** We strongly suggest using Chrome or Edge browsers to work through TechCamp. Do not use Firefox, as it is unable to copy/paste snippets that are required for TechCamp.

### Getting our Toolkit Ready
We will be using a browser based IDE called Goorm.
Start by creating a user account for yourself on:
## <a href="https://ide.goorm.io/" target="_blank">https://ide.goorm.io/</a>  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  


Take a moment and get your user account created. Be careful to remember your login credentials, you will need them for TechCamp.

#### STEP 1
Once logged into Goorm:
- Select the 'Dashboard' button
- From the Dashboard, select the '+ New Container' button

#### STEP 2
Configure your container.  
- `Name:` Choose a name without offensive words as we will share our sites with other participants later.  
- `Description:` You can leave this blank  
- `Region:` Oregon (US)  
- `Visibility:` Public  
- `Template:` Default Template  
- `Deployment:` Not Used  
- `GPU:` No GPU core  
- `Stack:` PHP  
- Leave the checkboxes under the Stack menu **unchecked**.  

<img src="0 - Images/00 Create Container Options.png" alt="Create Container Options">  

</br>
</br>

We are now ready to create the container:  

**Press the Create Button**

This will take a minute or two for container creation.   
<img src="0 - Images/00 Preparing Container.png" alt="Preparing Container">

#### STEP 3
When the container has been created, you'll see a screen stating:

**Container has been successfully created**  
<img src="0 - Images/00 Container created.png" alt="Container Creation Complete">  

Press the button: "Run Container"
This will take a few moments to launch.

### Where do the files live?
In the PROJECT pane, expand the folder with your container name on it.  
<img src="0 - Images/00 Files Folder and Terminal.png" width=800 alt="Files Folder and Terminal">

Expand the project folder, we will be working on files in this directory.
We can easily add extra files using the plus icon:  
<img src="0 - Images/00 Starter file and file creation.png" width=500 alt="Starter File and File Creation">

## STEP 4
<img src="0 - Images/00 Terminal Commands.png" width=500 alt="Enter commands in the Terminal">  

In the CLI - Copy paste this command, then press Enter/Return to run the command:
```
apt-get update
```

## STEP 5
Then run this line:
```
apt-get install -y mysql-server
```

Start mysql by running this line:
```
service mysql start
```

**NOTE: If your service failed to start**... something may be wrong with your container. We suggest trying to create a new container, by restarting this setup from step 1. If you continue to have issues, feel free to reach out to us for help. Our contact details are at the bottom of this page.


## STEP 6
Now let's install phpmyadmin by running this line:
```
apt-get install -y php7.3-mbstring php7.3-mysql phpmyadmin
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
**IT IS VERY IMPORTANT THAT YOU ENTER A PASSWORD. DO NOT LEAVE IT BLANK.**
```
Please provide a password for phpmyadmin to register with the database server. If left blank, a random password will be generated.
MySQL application password for phpmyadmin:
```

Enter Answer 3 into the command prompt **use the below password for this TechCamp for ease of following along**:
**NOTE:** you will not see the characters being entered in your terminal when you type this password. Please know that it is still accepting characters.
```
root
```
Press Enter/Return to accept. Enter the same password again when prompted for confirmation.

**If you accidentally left the password blank**: You may run into troubles if you forgot to enter a password and may be stuck waiting for the process to finish failing. It will probably be best to stop your container and try making a new one again.

## STEP 7
#### Restart your server
```
service apache2 restart
```
Press Enter/Return to accept.

## STEP 8
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

## STEP 9
### We are ready to view your project via /phpmyadmin
In your Goorm container, pick from the top menu:
```
Project
 > Running URL and Port
```
<img src="0 - Images/02 Open Running Port and URL.png" alt="Running URL and Port">

#### That will open window that looks like this:
<img src="0 - Images/02 Running URL.png" alt="Open the running URL">  

You'll see that a URL has been generated for your project. Select the icon pictured to open your project different browser tab/window, or copy/paste the url to do the same thing in a new tab/window.

Add the following text to the end of your URL:
```
/phpmyadmin
```

Your URL should look something like this:
```
mytechcamp-lbpaf.run-us-west2.goorm.io/phpmyadmin
```

When you open the url, you will hopefully see a screen that looks like this:  
<img src="0 - Images/00 Welcome to phpMyAdmin.png" alt="phpMyAdmin starting page">

# You are now ready to start TechCamp!  

### Are you having problems?
If you have problems reaching the **phpMyAdmin** screen, try entering the following commands into your terminal again and retry the link:
```
service apache2 restart
```
```
service mysql start
```

If you are still having trouble, please reach out to the folks at RRC's Applied Computer Education Department for assistance during the day within the 3 business days before your TechCamp Day at: acemarketing@rrc.ca


---
## That's all for Part 0: Before You Start!

# Links
**Coming up: [Part 1: Web Development](1%20Web%20Programming%20Demo.md)**  
**Return to [Web App Landing Page](../README.md)**
