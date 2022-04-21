#!/bin/bash

cd /app

sed -i 's/\r$//' /app/.env

set -o allexport
source /app/.env
set +o allexport

echo "----------Run composer install";
composer install

echo "----------Run optimize clear";
php artisan optimize:clear

echo "----------------chmod directories"
chmod -R 777 /app/bootstrap/cache
chmod -R 777 /app/storage

echo "-----------------Wait for database to be up and running ";
until nc -z ${DB_HOST} ${DB_PORT}; do sleep 1; echo "Waiting for DB...";  done

echo "-------------------Run migrations";
php artisan migrate:fresh

