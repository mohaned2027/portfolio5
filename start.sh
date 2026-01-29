#!/usr/bin/env sh
set -e

php artisan optimize:clear || true
php -S 0.0.0.0:$PORT -t public
