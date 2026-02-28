#!/bin/sh

echo "waiting db..."

until nc -z -v -w30 mysql 3306; do
    sleep 1
done

echo "running migrations..."
php artisan migrate --force

echo "starting PHP-FPM..."
php-fpm
