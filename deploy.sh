#!/bin/sh
git pull
composer update --no-dev --no-scripts
php artisan dump-autoload
php artisan migrate
