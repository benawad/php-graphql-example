#!/bin/bash

cd /var/www/html
source .env
docker-compose rm -f
git pull
docker-compose up --force-recreate
