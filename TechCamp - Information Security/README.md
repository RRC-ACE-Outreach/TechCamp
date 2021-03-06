### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Information Security

#### Follow along by video recordings on the Stream 2 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOngvMBaB6csvb17fOvNYhKM" target="_blank">Red River College ACE's - YouTube channel</a>**.  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  

---

## Contents

[Introduction and Connecting to Azure](#Introduction)

[Environment](#Environment)

[Scanning](#Scanning)

[MSF Console and UnrealIRCd](#unreal)

[MSF Console and vsftpd](#vsftpd)

[Cracking Passwords with John the Ripper](#passwords)

[Brute Forcing with Medusa](#medusa)

[Web Attacks](#webattacks)

[Where Can I Learn More](#learnmore)

---
<a name="introduction"></a>
## Introduction and Connecting to Azure

Welcome to the Red River College Information Security TechCamp.  We will cover basic penetration testing activities today.  These activities are referred to as "hacking" or "pentesting" and can be presented in a number of different contexts.  We will be using a purpose build vulnerable server running in a virtualized environment running on Azure cloud services, common for activities such as these.

You should have received an email with a link to either register for the Azure service, or to add the Azure VM to your Azure account.  Please click on this link, and register for your access to your testbed.

Once registered, you can access your virtual machine (VM) a couple of different ways, one using Remote Desktop (RDP), the other using a Secure SHell (SSH) terminal.  I would recommend using RDP, as this will give you access to a better web browser for the part of the activities where we attack a website.  You will need to set your own password, please set this, and remember your password going forward (write it down).  Please connect to your VM if you haven't already done so.

## Environment

Before we begin our attack, we really need to understand as much as possible about the environment we are operating in.  For our environment, we are connected to an instance of Ubuntu running on Azure, and within Ubuntu, a virtualized environment was created using VirtualBox (VB), and within VB, we have our target machine Metasploitable running.  We also have our attack machine Kali Linux running.  All activities will be done using Linux today, and in this environment:
<img src="./0-infosec_images/infosec 1 azure kali setup.PNG" alt="Pentest Environment">

The above is a typical configuration for this kind of activity, where you have Kali and your target machine running on the same network so you can send attacks across that network to discover and exploit any vulnerabilities.  While there are many graphical tools for these kinds of attacks, we will be using the command line for the most part.

## Scanning

It is common to start any attack with a network and service scan.  This involves discovering all machines that are running on your network, regardless if that network is physical or virtual, and all services that are running on those machines.  There are a number of tools that will do this, we will be looking at nmap

nmap wasn't designed to be a hacking tool, it is actually a system administrator's tool allowing sysadmins to map resources and services on their networks.  It is a mature and well respected network mapping tool, and given how effective it is, hackers and pentesters have adopted it as one of the more common tools used in pentest activities.  It isn't stealthy, however, but for our needs, it will work very well.

In RDP, click on the terminal icon in the Launcher found in the bottom center of your desktop.  It should look like this:
<img src="./0-infosec_images/infosec 2 launch bar.PNG" alt="Pentest Environment">

This should open a terminal window as seen here:
<img src="./0-infosec_images/infosec 3 terminal window.PNG" alt="Pentest Environment">

We will do most of our work in these terminal windows.  Those connected via SSH will just see the terminal, and you should be OK with most of what we do today.

In our terminal, scan our network with the nmap command.  We must understand our environment, so before we scan, we verify our IP information.  Once we have the IP of our host only network, we scan the entire network.  It is likely going to be the 192.168.56.0 network.  Type in the following commands in your terminal:
```
ip addr
nmap 192.168.56.0/24
```

Your results for the above should look like the following:
<img src="./0-infosec_images/infosec 4a ip addr.PNG" alt="Pentest Environment">
<img src="./0-infosec_images/infosec 4b nmap 1.PNG" alt="Pentest Environment">

You see a couple of machines showing up.  One has the same IP we discovered when we ran ip addr, so we know that is Ubuntu.  The other (likely 192.168.56.101) is a machine we don't recognize on our network, and likely our target machine.  Now we can do a detailed scan of our target machine:
``` 
nmap -sV 192.168.56.101
```

We should see the following detailed information about our target machine:
<img src="./0-infosec_images/infosec 5 detailed nmap.PNG" alt="Pentest Environment">

We will be focusing on the bolded services listed below:
<img src="./0-infosec_images/infosec 5b services.PNG" alt="Pentest Environment">


Now we can attack specific services.

<a name="unreal"></a>
## MSF Console and UnrealIRCd

The first service we are going to attack is port 6667 and the Unreal IRC daemon service process.  IRC is the origins of web based messaging, and UnrealIRCd is a server process that works with IRC.  If we are to research that version of UnrealIRCd, we would discover there is a known vulnerability, and this vulnerability has an exploit in the command line tool Metasploit Framework (MSF Console).  First thing we should do is open a new tab in our terminal program and launch msfconsole, as below.  Having multiple tabs open makes jumping back and forth between results easier:
<br /><img src="./0-infosec_images/infosec 6 msfconsole start.PNG" alt="Pentest Environment">

Please note the startup of msfconsole will display ASCII art, and this art will likely be different each time you start.  Sometimes, the art looks like a failure, but we are specifically looking for the following line:
```
msf6 >
```

This is our msfconsole prompt, where we launch our attacks from.  If we are going to attack the Unreal IRC server, we need to configure our attack.  This often require research and trial and error, however, we will focus on results today.  Type in the following:
```
use exploit/unix/irc/unreal_ircd_3281_backdoor
set RHOSTS 192.168.56.101
set payload cmd/unix/bind_perl
show options
exploit
whoami
```

You should see the following after a few minutes:
<img src="./0-infosec_images/infosec 7 irc exploit 1.PNG" alt="Pentest Environment">

Congrats, you are now a HAKORZZZZZ!!!!!

We are going to have to exit this, so hit Ctrl + C to exit out of the msf session.  You can open a new terminal window or tab, however the resources for these VMs are somewhat limited, so it is not advised to have too much open concurrently in this environment.
<img src="./0-infosec_images/infosec 7 irc exploit 2.PNG" alt="Pentest Environment">

<a name="vsftpd"></a>
<h3>MSF Console and vsftpd</h3>

Let's take a look at another vulnerable service, specifically vsftpd.  Again, we would research our discovery and try and realize any known vulnerabilities.  Again, there is an exploit in MSF console.
```
use exploit/unix/ftp/vsftpd_234_backdoor
show options
set RHOST 192.168.56.101
show options
exploit
whoami
```

This time, we can see the before and after of our settings.  I have also included a troubleshooting demo if things don't go well.  Many of the tools we use are created by and for hackers, and as such, can be a bit rough around the edges.  In our example, we needed to run the exploit a couple of times to get it to work.  
<img src="./0-infosec_images/infosec 8 vsftp 1.PNG" alt="Pentest Environment">
<img src="./0-infosec_images/infosec 8 vsftp 2.PNG" alt="Pentest Environment">

Sometimes we even crash our target VM with our pentest activities, and in that case, we need to reboot our VM, as seen in this video:
[Metasploitable VM Reboot](https://youtu.be/-5hE6Gm1QLw).

<a name="passwords"></a>
## Cracking Passwords with John the Ripper

Now we have root access to a target machine, let's see if we cant crack some passwords.  We are going to first use a tool called John the Ripper.  John the Ripper is a tool with a long history.  It doesn't get installed by default when you usually set up a Linux box, but it is installed in system like Kali, and is available to us.  If we are going to use John the Ripper (john), we need a list of usernames and passwords to crack.  Fortunately, in our attack above, we have root access and we can see the users and passwords.  Let's steal that info (exfultrate) to our Kali box so we can crack the passwords with Kali.  First thing I like to do is create a separate directory for each activity or system I attack.  In this case, we are attacking Metasploitable, so let's create a directory for this.  Open a new tab in your terminal application, and type the following:
```
mkdir metasploitable
cd metasploitable
ls
``` 

This will create an empty directory, or folder, for our work. 
<img src="./0-infosec_images/infosec 9 passwords 1.PNG" alt="Pentest Environment">

Now let's exfultrate our data.  In our tab we have our metasploit attack open, we can look at the contents of two files, the /etc/passwd file (that contains most user information, but not passwords, and a separate file /etc/shadow (that contains the actual passwords, but in an encrypted or hashed format).  We can view these and copy them to a text editor, we will be using Leafpad, a simple text editor similar to Notepad in Windows.  In Ubuntu, in the upper left corner, select Applications --> Accessories --> Leafpad.  Move it off to the side so you can see both the terminal and Leafpad side by each.  In the terminal, type the following **in the tab with the vsftpd attack** 
```
cat /etc/passwd
```

Highlight the text that contains the username information, and from the menu at the top select Edit --> Copy.  Paste the text in Leafpad, as seen below:
<img src="./0-infosec_images/infosec 9 passwords 2.PNG" alt="Pentest Environment">

You need to save your work now, so in Leafpad, go to File --> Save, and select the pentest folder along the left side, select our working directory metasploitable, and in the file name, type in passwd.txt (or any filename you prefer):
<img src="./0-infosec_images/infosec 9 passwords 3.PNG" alt="Pentest Environment">

We are going to do the same with the /etc/shadow file, open a new instance of Leafpad, highlight the lines, copy/paste to Leafpad, and save our work again in the correct directory:
```
cat /etc/shadow
```
<img src="./0-infosec_images/infosec 9 passwords 4.PNG" alt="Pentest Environment">

Once you have exfultrated the necessary data, you can go back to your terminal, select the tab you created to make the work directory (it should be the last tab on the right) and verify you have the directory listing below.  After we exfultrate our files, we want to merge them into a single file that John the Ripper can handle, and we do this with the unshadow command, an executable that gets installed with John the Ripper:
```
ls -al
unshadow passwd.txt shadow.txt > passwords_to_crack.txt
ls -al
```

<img src="./0-infosec_images/infosec 9 passwords 5.PNG" alt="Pentest Environment">

Now we are ready to try and crack some passwords:
``` 
john passwords_to_crack.txt
```

Your screen will look like this in a few minutes:
<img src="./0-infosec_images/infosec 9 passwords 6.PNG" alt="Pentest Environment">

Some items of note: this is possible only because we have root access to the system.  This is more accurately described as a password audit rather than password hacking.  

After a while, you can stop John the Ripper with Ctrl + C

We see that there are still some passwords that haven't been cracked.  For example, when we look at either our passwd or shadow files, we see the characters from South Park haven't been cracked yet.  Let's see if we cant do that with another cracking tool

<a name="medusa"></a>
## Brute Forcing with Medusa

Let's see if we can't figure out the passwords for cartman, kenny, kyle, and stan.  We see them in our list of users, but our attempt at cracking their passwords failed, so let's try again.  We are going to use a dictionary of real world passwords found from a website in the wild.  As always, there are different ways to solve this; we can create a list of users, find a dictionary, iterate through the users and with each user, try the passwords in our dictionary.  Let's try that now.  First, let's create our users.  Feel free to close down all instances of Leafpad and start a new one.  In Leafpad, add the four users we want to attack, one on each line, all lower case as we saw in the passwd and shadow files:
<img src="./0-infosec_images/infosec 10 medusa 1.PNG" alt="Pentest Environment">

Next we need to prepare our dictionary.  This is a large list of passwords that were taken from a website a number of years ago, so this is a real-world, unfiltered list of passwords that people have used in the past, and continue to use today.  It is so big, it is usually compressed into the UNIX equivalent of a zip file, but I have prepared it ahead of time so we can just use it, as below:
```
medusa -U users.txt -P /usr/share/wordlists/rockyou.txt -M ssh -h 192.168.56.101 -O success.txt
```

With the above, the arguments do the following:
* -U for a list of users (a single user would be -u, or lower case)
* -P for a list of passwords (a single password would be -p, or lower case)
* -M is for the module, or protocol.  We are attacking the SSH protocol
* -h for the host (if we had a list of hosts, we would use upper case H) 
* -O to output the results to be stored to a text file (upper case of letter O, not number zero)

<img src="./0-infosec_images/infosec 10 medusa 2.PNG" alt="Pentest Environment">

This will run for a few minutes.  When complete, you should see Stan's password displayed.  If you want to see all results, **after** medusa is complete, type the following:
```
cat success.txt
```

You should see the following
<img src="./0-infosec_images/infosec 10 medusa 3.PNG" alt="Pentest Environment">

---
<a name="webattacks"></a>
## Web Attacks

Due to the ubiquitous nature of websites for most organizations, we see many attacks happening through a web browser to a web site.  Let's look at some popular examples of these types of attacks.  In your Ubuntu VM, in the Launcher at the bottom, you should see the option to launch a web browser.  You can also do this with the start like button in the upper left: Applications --> Web Browser.  This should take you to the web server running on our target machine.  If not, set the IP address in the browser's address bar to the IP address of our target machine.  You should see the following:
<img src="./0-infosec_images/infosec 11 web 1.PNG" alt="Pentest Environment">

We are going to select DVWA, a purposely weekly designed website that allows us to try some basic web attack activities.  The nice thing about DVWA is the source code shows us both easy and difficult code to attack. 

The first thing we need to do is log in.  The username and password are below:
```
username: admin
password: password
```

As we said, this isn't a secure site. 

Before we go forward, we need to change the settings.  Along the left side, select Security, and on the DVWA Security page, select Low from the drop down list, and select Low in the Script Security option, as seen below:
<img src="./0-infosec_images/infosec 11 web 2.PNG" alt="Pentest Environment">

Once this is set, you can then try any of the attacks along the side.  Let's look at command injection and chaining.  Some systems allow you to run certain commands as if you were logged in to the terminal.  It isn't common, however, if you see something like the screen below, allowing you to ping a website (Ping for FREE), what might happen is whatever you are typing in gets passed directly to the underlying command, possibly with no mitigations in possible.  Let's try the command without any hacking, we will ping our machine directly, let's ping localhost.
```
localhost
```

You should see the following:
<img src="./0-infosec_images/infosec 11 web 3.PNG" alt="Pentest Environment">

Now let's see if we can inject a command using UNIX command chaining.  This is a technique where you execute multiple UNIX (in this case, Linux) commands in one single command line by separating the commands with a semi colon.  Consider:
```
localhost; ls
```

<img src="./0-infosec_images/infosec 11 web 4.PNG" alt="Pentest Environment">

If the above works, we have an indication that this page is subject to command chaining.  What is happening in the background is the ping command is running with the web form data, and executing it unchecked.  We added an unexpected command with the semi colon; chaining one command to another command.  Below is what is happening on the server based on our form data:
```
ping localhost; ls
```

Let's try a couple of attacks:
```
localhost; cat /etc/passwd
```

<img src="./0-infosec_images/infosec 11 web 5.PNG" alt="Pentest Environment">

The above will show the users in the system, and as we saw above, we can use this information with Medusa to gain access to the system.

Let's try something else.  Let's see if we can see some database information.  We are going to try a different attack.  For arguments sake, let's assume we have discovered the configuration file for our DVWA application.  We can use this to look at the database configuration for our web app with the following injection:
```
localhost; cat /var/www/dvwa/config/config.inc.php
```

<img src="./0-infosec_images/infosec 11 web 6.PNG" alt="Pentest Environment">

When we look at this, it doesn't look like we have succeeded, but if we look at the source code for this page (the second half of the above image), we discover the username and password for the database:
```
username: root
password:
```

Worrying, the password field is empty.  Let's try connecting to the database.  Go back to the vsftpd screen, where you are logged in as root, and try and connect to the mysql database software with the following commands:
```
python -c 'import pty; pty.spawn("/bin/bash")'
mysql -u root
show databases;
\q
```

<img src="./0-infosec_images/infosec 11 web 8.PNG" alt="Pentest Environment">

With the above, you should see that we now have root access to the database, we can look at all the databases and all the data in those databases (if you know the SQL language).  Some quick notes on the above:

* the python command creates a better shell allowing us to use tools like mysql 
* the mysql command logs us into the database, this time as user root with no password
* the show databases is a SQL command to display all databases this account has access to.  We might be able to exfultrate all kinds of data now
* the \q exits the system so we don't destroy data.

As you can start to see, attacks are multi vector in nature.  For this, we have a combination of the website, a service exploit, and a database exploit all working together to exfultrate sensitive data.

---
<a name="learnmore"></a>
## Where can I learn more?

Virtual machines like the one we attacked - Metasploitable - can be found online on sites like vulnhub (https://vulnhub.com).  The toolset we used for hacking can be found on the Kali website: (https://kali.org).  The environment we used for our virtualization inside of Azure is called VirtualBox: (https://www.virtualbox.org).

If you wish to learn more about security audits and the many different kinds of attacks that can happen to a website, visit [https://www.owasp.org, ](https://www.owasp.org/)the Open Web Application Security Project. This is a community built around the idea of letting the public know about the different types of attacks that can happen, and how to prevent them.

And remember what our favorite web slinger always says; with great power comes great responsibility. You should **never** use this knowledge against someone who is unwilling.

Hacking is illegal, and you can be fined, jailed, or even extradited over these crimes. Use this knowledge wisely, to protect yourself, and those who are willing to be protected by you.
