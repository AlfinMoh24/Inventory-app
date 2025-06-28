#!/bin/bash
set -e

if [ ! -d vendor ]; then
    composer install --no-dev --optimize-autoloader
fi

php artisan key:generate --force

php artisan migrate --force

exec apache2-foreground
