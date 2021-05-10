### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Information Security

#### Follow along by video recordings on the Stream 2 playlist on **<a href="https://youtube.com/playlist?list=PL6Izhxz8ouOngvMBaB6csvb17fOvNYhKM" target="_blank">Red River College ACE's - YouTube channel</a>**.  
*HINT: hold the `CTRL` key on Windows, or `Command` on Mac when clicking the link to open in a new tab.*  

<h2>Introduction and Connecting to Azure</h2>

Welcome to the Red River College Information Security TechCamp.  We will cover basic penetration testing activities today.  These activities are referred to as "hacking" or "pentesting" and can be presented in a number of different contexts.  We will be using a purpose build vulnerable server running in a virtualized environment running on Azure cloud services, common for activites such as these.

You should have received an email with a link to either register for the Azure service, or to add the Azure VM to your Azure account.  Please click on this link, and register for your access to your testbed.

Once registered, you can access your virtual machine (VM) a couple of different ways, one using Remote Desktop (RDP), the other using a Secure SHell (SSH) terminal.  I would recommend using RDP, as this will give you access to a better web browser for the part of the activities where we attack a website.  Please connect to your VM if you haven't already done so.

<h3>Environment</h3>

Before we begin our attack, we really need to understand as much as possible about the environment we are operating in.  For our environment, we are connected to an instance of Ubuntu running on Azure, and within Ubuntu, a virtualized environment was created using VirtualBox (VB), and within VB, we have our target machine Metasploitable running.  We also have our attack maching Kali Linux running.  All activities will be done using Linux today, and in this environment:
image of testbed

The above is a typical configuration for this kind of activity, where you have Kali and your target machine running on the same network so you can send attacks across that network to discover and exploit any vulnerabilities

<h3>Scanning</h3>

This kind of threat also goes by the acronym of XSS. This threat is one of the more common attacks done to a website in the modern age. It can be tricky to deal with it, even if you realize that it is happening to you. The idea behind this threat is that you place an otherwise harmless piece of code on a website that allows you to save information. This harmless code loads more code from a different website. The code on this other website is anything but harmless. It can be used to gather private information from you, or to change the entire structure of your website.

At best, a cross site scripting threat will simply deface your website. You see this threat almost immediately and you can begin to clean it up so other people can view your website again. At worst, this threat can be quick and silent, tracking information about you and your website. This kind of attack could be on your site for weeks, months, or even years before you discover it.


---

<h2>Where can I learn more?</h2>

If you wish to learn more about security audits and the many different kinds of attacks that can happen to a website, visit [https://www.owasp.org, ](https://www.owasp.org/)the Open Web Application Security Project. This is a community built around the idea of letting the public know about the different types of attacks that can happen, and how to prevent them.

And remember what our favorite web slinger always says; with great power comes great responsibility. You should **never **use this knowledge against someone who is unwilling.

Hacking is illegal, and you can be fined, jailed, or even extradited over these crimes. Use this knowledge wisely, to protect yourself, and those who are willing to be protected by you.
