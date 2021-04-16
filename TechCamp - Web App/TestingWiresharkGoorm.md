# Let us try and get tshark (cli version) working on Goorm
https://www.wireshark.org/docs/wsug_html_chunked/AppToolstshark.html#:~:text=TShark%20is%20a%20terminal%20oriented,the%20same%20options%20as%20wireshark%20.
```
sudo apt-get install tshark
```
installing tshark was super snappy and lightweight.

### Starting up tshark
```
sudo tshark
```

here's what we get in the terminal:
```
root@goorm:/workspace/ace-tech-camp-test# sudo tshark
Running as user "root" and group "root". This could be dangerous.
Capturing on 'Cisco remote capture: ciscodump'
tshark: Couldn't run /usr/bin/dumpcap in child process: Operation not permitted

tshark: Error by extcap pipe:
** (process:5447): WARNING **: 14:46:40.488: Missing parameter: --remote-host

0 packets captured
```

hmm, let's look at the documentation?
https://www.wireshark.org/docs/man-pages/tshark.html


*NOTE:* I ended up replying to Nola's email on the topic of whether we could install wireshark on Goorm - hopefully somebody from the Networking team can suggest options to run against the command. \- Andrea



# Below is documentation of a failed attempt at Wireshark installation on Goorm
\------------------------------------------------
# Let us try and get wireshark working on Goorm
Trying this method: https://askubuntu.com/questions/700712/how-to-install-wireshark

Here's the short version:
### Step 1: Add the stable official PPA. To do this, go to terminal by pressing Ctrl+Alt+T and run:
```
sudo add-apt-repository ppa:wireshark-dev/stable
```
### Step 2: Update the repository:
```
sudo apt-get update
```
### Step 3: Install wireshark 2.0:
```
sudo apt-get install wireshark
```
### Step 4: Run wireshark:
```
sudo wireshark
````
If you get a error couldn't run /usr/bin/dumpcap in child process: Permission Denied. go to the terminal again and run:
```
sudo dpkg-reconfigure wireshark-common
```
Say YES to the message box. This adds a wireshark group. Then add user to the group by typing
```
sudo adduser $USER wireshark
```
Then restart your machine and open wireshark. It works. Good Luck.

## Here's how it all shook out
```
root@goorm:/workspace/ace-tech-camp-test# sudo add-apt-repository ppa:wireshark-dev/stable
 Latest stable Wireshark releases back-ported from Debian package versions.

Back-porting script is available at https://github.com/rbalint/pkg-wireshark-ubuntu-ppa

From Ubuntu 16.04 you also need to enable "universe"  repository, see:
http://askubuntu.com/questions/148638/how-do-i-enable-the-universe-repository

The packaging repository for Debian and Ubuntu is at: https://salsa.debian.org/debian/wireshark
 More info: https://launchpad.net/~wireshark-dev/+archive/ubuntu/stable
Press [ENTER] to continue or Ctrl-c to cancel adding it.
Get:1 https://cli-assets.heroku.com/apt ./ InRelease [2879 B]
Get:2 http://security.ubuntu.com/ubuntu bionic-security InRelease [88.7 kB]
Get:3 http://ppa.launchpad.net/ondrej/php/ubuntu bionic InRelease [20.8 kB]
Hit:4 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic InRelease
Get:5 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-updates InRelease [88.7 kB]
```
### Err 1
```
Err:1 https://cli-assets.heroku.com/apt ./ InRelease
  The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22404A6F9F1CA
Get:7 http://ppa.launchpad.net/wireshark-dev/stable/ubuntu bionic InRelease [21.3 kB]
Get:8 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-backports InRelease [74.6 kB]
Get:6 https://cf-cli-debian-repo.s3.amazonaws.com stable InRelease [2679 B]
Get:9 http://security.ubuntu.com/ubuntu bionic-security/universe amd64 Packages [1402 kB]
Get:10 http://security.ubuntu.com/ubuntu bionic-security/restricted amd64 Packages [348 kB]
Get:11 http://security.ubuntu.com/ubuntu bionic-security/main amd64 Packages [2045 kB]
Get:12 http://ppa.launchpad.net/ondrej/php/ubuntu bionic/main amd64 Packages [157 kB]
Get:13 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-updates/universe amd64 Packages [2170 kB]
Get:14 http://ppa.launchpad.net/wireshark-dev/stable/ubuntu bionic/main amd64 Packages [3969 B]
Get:15 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-updates/restricted amd64 Packages [378 kB]
Get:16 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-updates/main amd64 Packages [2475 kB]
```
### Err 6
```
Err:6 https://cf-cli-debian-repo.s3.amazonaws.com stable InRelease
  The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli-eng@pivotal.io>
Fetched 9278 kB in 9s (1045 kB/s)
Reading package lists... Done
W: An error occurred during the signature verification. The repository is not updated and the previous index files will be used. GPG error: https://cli-assets.heroku.co
m/apt ./ InRelease: The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22404A6F9F1CA
W: An error occurred during the signature verification. The repository is not updated and the previous index files will be used. GPG error: https://cf-cli-debian-repo.s
3.amazonaws.com stable InRelease: The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli-eng@pivotal.io>
W: Failed to fetch http://packages.cloudfoundry.org/debian/dists/stable/InRelease  The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli
-eng@pivotal.io>
W: Failed to fetch https://cli-assets.heroku.com/apt/./InRelease  The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22
404A6F9F1CA
W: Some index files failed to download. They have been ignored, or old ones used instead.
```

## Let's see if we can move onto the other commands
```
root@goorm:/workspace/ace-tech-camp-test# sudo apt-get update
Get:1 https://cli-assets.heroku.com/apt ./ InRelease [2879 B]
Get:3 http://security.ubuntu.com/ubuntu bionic-security InRelease [88.7 kB]
Hit:4 http://ppa.launchpad.net/ondrej/php/ubuntu bionic InRelease
Hit:5 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic InRelease
Hit:6 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-updates InRelease
Hit:7 http://ppa.launchpad.net/wireshark-dev/stable/ubuntu bionic InRelease
Hit:8 http://ap-northeast-2.ec2.archive.ubuntu.com/ubuntu bionic-backports InRelease
Get:2 https://cf-cli-debian-repo.s3.amazonaws.com stable InRelease [2679 B]
Err:1 https://cli-assets.heroku.com/apt ./ InRelease
  The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22404A6F9F1CA
Err:2 https://cf-cli-debian-repo.s3.amazonaws.com stable InRelease
  The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli-eng@pivotal.io>
Fetched 94.3 kB in 4s (22.5 kB/s)
Reading package lists... Done
W: An error occurred during the signature verification. The repository is not updated and the previous index files will be used. GPG error: https://cli-assets.heroku.co
m/apt ./ InRelease: The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22404A6F9F1CA
W: An error occurred during the signature verification. The repository is not updated and the previous index files will be used. GPG error: https://cf-cli-debian-repo.s
3.amazonaws.com stable InRelease: The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli-eng@pivotal.io>
W: Failed to fetch http://packages.cloudfoundry.org/debian/dists/stable/InRelease  The following signatures were invalid: EXPKEYSIG 172B5989FCD21EF8 CF CLI Team <cf-cli
-eng@pivotal.io>
W: Failed to fetch https://cli-assets.heroku.com/apt/./InRelease  The following signatures couldn't be verified because the public key is not available: NO_PUBKEY 5DC22
404A6F9F1CA
W: Some index files failed to download. They have been ignored, or old ones used instead.
```
## Trying to install Wireshark now (note: uses 572MB of disk space)
Everything seems like it worked fine. Not copy/pasting log.
```
Should non-superusers be able to capture packets? [yes/no]
```
Answer *yes*

## Let's try to run wireshark and see what that looks like.
... I had suspected this would happen.
We can't run Wireshark because there is no display.
Here's a copy of the log:
```
root@goorm:/workspace/ace-tech-camp-test# sudo wireshark
14:39:39.897     Main Warn QStandardPaths: XDG_RUNTIME_DIR not set, defaulting to '/tmp/runtime-root'
14:39:39.897     Main Warn QXcbConnection: Could not connect to display
14:39:39.897     Main Crit Could not connect to any X display.
```

# So, there we have it. No wireshark on Goorm.
