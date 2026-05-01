#!/bin/sh
set -e

echo "Running migrations..."
php artisan migrate --force

echo "Caching configuration and routes..."
php artisan optimize

echo "Starting application..."
exec "$@"
