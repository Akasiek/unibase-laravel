#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-suggest --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating .env file"
    cp .env.example .env
fi

php artisan migrate
php artisan optimize
php artisan view:cache

npm install
npm run build

php-fpm -D
nginx -g "daemon off;"
