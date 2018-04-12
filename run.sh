#!/bin/bash

cd /var/www/html
source .env
sed -- "s/___HOSTNAME___/$CFG_HOSTNAME/g;" docker-compose.yml.tmpl > docker-compose.yml
docker-compose rm -f
git pull
docker-compose up --force-recreate
