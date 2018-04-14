#!/bin/bash

cd /var/www/html
source .env
sed -- "s/___HOSTNAME___/$CFG_HOSTNAME/g;" docker-compose.tmpl.yml > docker-compose.yml
touch /tmp/acme.json
chmod 0600 /tmp/acme.json
docker-compose rm -f
git pull
docker-compose up --force-recreate
