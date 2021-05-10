### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Information Security

#### Follow along by video recordings on the Stream 2 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOngvMBaB6csvb17fOvNYhKM" target="_blank">Red River College ACE's - YouTube channel</a>**.  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  

<h2>Introduction and Connecting to Azure</h2>

Welcome to the Red River College Information Security TechCamp.  We will cover basic penetration testing activities today.  These activities are referred to as "hacking" or "pentesting" and can be presented in a number of different contexts.  We will be using a purpose build vulnerable server running in a virtualized environment running on Azure cloud services, common for activites such as these.

You should have received an email with a link to either register for the Azure service, or to add the Azure VM to your Azure account.  Please click on this link, and register for your access to your testbed.

Once registered, you can access your virtual machine (VM) a couple of different ways, one using Remote Desktop (RDP), the other using a Secure SHell (SSH) terminal.  I would recommend using RDP, as this will give you access to a better web browser for the part of the activities where we attack a website.  You will need to set your own password, please set this, and remember your password going forward (write it down).  Please connect to your VM if you haven't already done so.

<h3>Environment</h3>

Before we begin our attack, we really need to understand as much as possible about the environment we are operating in.  For our environment, we are connected to an instance of Ubuntu running on Azure, and within Ubuntu, a virtualized environment was created using VirtualBox (VB), and within VB, we have our target machine Metasploitable running.  We also have our attack maching Kali Linux running.  All activities will be done using Linux today, and in this environment:
## image of testbed. ##

The above is a typical configuration for this kind of activity, where you have Kali and your target machine running on the same network so you can send attacks across that network to discover and exploit any vulnerabilities.  While there are many graphical tools for these kinds of attacks, we will be using the command line for the most part.

<h3>Scanning</h3>

It is common to start any attack with a network and service scan.  This involves discovering all machines that are running on your network, regardless if that network is physical or virtual, and all services that are running on those machines.  There are a number of tools that will do this, we will be looking at nmap

nmap wasn't designed to be a hacking tool, it is actually a system administrator's tool allowing sysadmins to map resources and services on their networks.  It is a mature and well respected network mapping tool, and given how effective it is, hackers and pentesters have adopted it as one of the more common tools used in pentest activities.  It isn't stealthy, however, but for our needs, it will work very well.

In RDP, click on the terminal icon in the Launcher found in the bottom center of your desktop.  It should look like this:
## image of launcher ##

This should open a terminal window as seen here:
## image of terminal ##

We will do most of our work in these terminal windows.  Those connected via SSH will just see the terminal, and you should be OK with most of what we do today.

In our terminal, scan our network with the nmap command.  We must understand our environment, so before we scan, we verify our IP information.  Once we have the IP of our host only network, we scan the entire network.  It is likely going to be the 192.168.56.0 network.  Type in the following commands in your terminal:
```
ip addr
nmap 192.168.56.0/24
```



---

<h2>Where can I learn more?</h2>

Virtual machines like the one we attacked - Metasploitable - can be found online on sites like (https://vulnhub.com).  The toolset we used for hacking can be found on the Kali website: (https://kali.org).  The environment we used for our virtualization inside of Azure is called VirtualBox: (https://www.virtualbox.org).

If you wish to learn more about security audits and the many different kinds of attacks that can happen to a website, visit [https://www.owasp.org, ](https://www.owasp.org/)the Open Web Application Security Project. This is a community built around the idea of letting the public know about the different types of attacks that can happen, and how to prevent them.

And remember what our favorite web slinger always says; with great power comes great responsibility. You should **never **use this knowledge against someone who is unwilling.

Hacking is illegal, and you can be fined, jailed, or even extradited over these crimes. Use this knowledge wisely, to protect yourself, and those who are willing to be protected by you.
