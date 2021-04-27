### Red River College's Applied Computer Education Department presents  
## Tech Camp
# Part 3: Networking

### Let's Get Started
**TODO: This section needs to be written formatted and screenshots added. Below notes are copy-pasted from script.**

#### Script
Tech Camp 2021

Introduction:
We all use the Internet daily for many things.  What do you use it for?

Networks provide the underlying communications paths that the Internet run on.  All communication must take place over some sort of media.  Each type of media uses different methods for communication.  Copper cables (Ethernet or co-ax) use electrical impulses to send data.  Fiber-optic cables uses pulses of light.  Wireless transmission is accomplished through modulation of specific frequencies of electromagnetic waves.  Regardless of the media, all transmissions are sent as binary (ones and zeroes) either on or off. So when using fiber optic – the light is either on or off (1 or 0).

Using the internet perhaps by connecting to a web site may involve many different types of media.  Picture of network with different media through the path

Typical home network setup.  Within our typical home network, we have internal media which may be wireless and/or Ethernet.  Our ISP provides us with hardware and a connection to their service.  That connection can be fibre optic, co-ax cable.  Their equipment provides your home network with a DHCP server, a gateway and NAT.  A DHCP server provides logical addresses to any powered-on device.  The gateway provides the device with an address to get off of the network and out to the Internet.  The NAT (Network Address Translation) will translate our private address into a public address which will allow that information to go out onto the Internet.  Private internal addresses are not allowed on the internet and were designed to expand the address space of IPv4.  The ISP hardware also provides a switching function where the device will convert the internal communication protocols into the required protocol to go out to the Internet.

Standards are set and enforced for all network communication.  To understand the reason we need to learn a little about the history of the computer industry. Not long ago, Companies like IBM and Digital Equipment Corporation (DEC) were the leading computer manufacturers in the world manufactured devices which were not compatible with each other. So if you bought a computer from IBM you had to buy a monitor, printer and everything from IBM. There were many companies that bought equipment from both equipment manufacturers but the problem was the devices could not communicate with each other. That was about the time when international organization for standards or more commonly known as ISO thought that there was a need for a standard.  Now all devices and communications adhere to standards meaning equipment can work seamlessly together and devices from all different manufacturers can communicate.


We have all sorts of acronyms in the networking world.  Some you may recognize.
IPv4 – Internet Protocol version 4
IPv6 – Internet Protocol version 6
TCP – Transport Control Protocol
UDP – User Datagram Protocol
DNS – Domain Name Service  
DHCP – Dynamic Host Configuration Protocol
Http – hypertext transfer protocol
Https – secure hypertext transfer protocol


If you were to mail a letter, you are required to perform certain tasks and to provide information in a standard format.  You would provide the address of the recipient on the front of the envelope.  You would usually put your address in the top left-hand corner of the envelope so that the recipient knows where the letter came from.  You would also put a stamp in the top right-hand corner of the envelope.  By performing these tasks and conforming to the standards, you would assume your letter would move through the postal system and would be successfully delivered.  Like a letter, certain pieces of information are required for any network communication to take place. The three required pieces are MAC address, logical address and port number.

MAC address is a physical address of the network interface.  You can look at your MAC address in a variety of ways.  MAC addresses are unique.  Some operating systems will allow you to randomize your MAC address as a security feature.

IP Address – can be ipv4 or ipv6.  Most devices will have both addresses as IPv4 is reaching its end-of-life and we will be moving to IPv6.  

DHCP - Will assign an address to a device from a group of available addresses.  This can be configured by the administrator.

Gateway - is the router port that will allow you to get off the internal network and access another network or the internet.  In your home network this is the typically the device provided by the ISP.

How to find this information?  Each device is different.  The Powerpoint presentation provides screenshots to help you find all of your address information on various devices.  Can you find your information on your goorm container?  On your phone?  On your device?

Port number – used to identify the application required.  There are well-known port numbers which identify certain applications such as http (80) or https (443).  A port number can be any number between 0-65535.

DNS – maps names to ip addresses.  Without a DNS service we would have to remember the IP address for every web site we wanted to visit.

Use nslookup on a windows machine or use dig on Linux machines & find address for rrc.ca.  Open browser & access via ip address

Goorm Container Setup Commands
apt install tshark -y
usermod -a -G wireshark root 
newgrp wireshark
chgrp wireshark /usr/bin/dumpcap
apt install dnsutils -y





