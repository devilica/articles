#!/usr/bin/env bash
set -e

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Linking storage"
php /var/www/html/artisan storage:link --force || true

echo "Caching config..."
php /var/www/html/artisan config:cache

echo "Running migrations..."
php /var/www/html/artisan migrate --force
