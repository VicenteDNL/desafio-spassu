#!/bin/sh
composer install
php artisan migrate
cd .php-cs-fixer && composer install
php-fpm