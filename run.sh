#!/bin/bash

cd /var/www/html
docker-compose rm -f
git pull
docker-compose up --force-recreate
