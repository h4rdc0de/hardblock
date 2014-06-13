hardblock - v1.0
coded by hardcode

hardblock is a way to block abusive users and spammers, by scarvenging IP from lists in an efficient way such as the following blocklists:

* All TOR exit nodes
* BruteForceBlocker
* AutoShun
* OpenBL

# Why is tor blocked #

I do not hate tor, I support TOR but the problem is a lot of abuse is coming from the TOR network. I'm not talking about the hidden sites etc. but the use of tor as a
mass proxy supplier for Slowloris over tor and other DoS attacks, and spam bots. Therefore tor is blocked. 

If you don't want to block tor you can just edit to code to not do this (listformer.php)

# Cloudflare Integration #

This script will use the CF API to block the IP in question from the cloudflare network, so the IP does not reach your server again.

# Install #

1. Copy files to webserver
2. CHMOD 777 blocklist.txt
3. Create hourly cronjob for the file lisformer.php
4. Include blockip.php in your code
5. Edit your cloudflare API if you wish to use this feature 
