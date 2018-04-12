Prepare your server

- Create a hostname (eg blah.microsoft.com), point A record to your server IP
- apt update, install php 7.2 ppa, update, upgrade
- Install Docker, composer

Check this git repo out to /var/www/html/
`cd /var/www/html/`
`echo "CFG_HOSTNAME='blah.microsoft.com'" > .env`
`bash run.sh`
Now POST to https://blah.microsoft.com to see graphql