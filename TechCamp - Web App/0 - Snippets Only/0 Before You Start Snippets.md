### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 0: Before you Start
# SNIPPETS ONLY VERSION


*The full version of these notes exist here: [0 Before You Start Demo](../0%20Before%20You%20Start%20Demo.md)*
#### Follow along by video recordings on the Stream 1 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOmmyt8O3aTvsyM7iYDj5d-J" target="_blank">Red River College ACE's - YouTube channel</a>**. 

#### STEP 1
Start by creating a user account for yourself on
## <a href="https://ide.goorm.io/" target="_blank">https://ide.goorm.io/</a>


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

#### STEP 3
Once the container is created, `Run the Container`
Add files in the project pane using the `+` button

## STEP 4
```
apt-get update
```

## STEP 5
```
apt-get install -y mysql-server
```

```
service mysql start
```

## STEP 6
```
apt-get install -y php7.3-mbstring php7.3-mysqli phpmyadmin
```

Question: Please choose the web server that should be automatically configured to run phpMyAdmin.
  1. apache2  2. lighttpd  

Response:
```
1
```
Question: Configure database for phpmyadmin with dbconfig-common? [yes/no]  

Response:
```
yes
```
Question: Please provide a password for phpmyadmin to register with the database server. If left blank, a random password will be generated.
MySQL application password for phpmyadmin:  

Response:  
```
root
```

## STEP 7
```
service apache2 restart
```

## STEP 8
```
mysql
```
```
GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost' WITH GRANT OPTION;
```
```
exit
```
```
service apache2 restart
```

## STEP 9
```
/phpmyadmin
```

Your URL should look something like this:
```
mytechcamp-lbpaf.run-us-west2.goorm.io/phpmyadmin
```
# You are now ready to start TechCamp!  

### Are you having problems?
If you have problems reaching the **phpMyAdmin** screen, try entering the following commands into your terminal again and retry the link:
```
service apache2 restart
```
```
service mysql start
```

If you are still having trouble, please reach out to the folks at RRC's Applied Computer Education Department for assistance during the day within the 3 business days before your TechCamp Day at: [acemarketing@rrc.ca](mailto:acemarketing@rrc.ca?subject=Tech%20Camp%20Helpline)



---
### That's all for Part 0: Before You Start SNIPPETS ONLY VERSION!
# Links
**Return to [Part 0: Before You Start full notes](../0%20Before%20You%20Start%20Demo.md)**  
**Coming up: [Part 1: Web Development](../1%20Web%20Programming%20Demo.md)**  
**Return to [Web App Landing Page](../../README.md)**  
