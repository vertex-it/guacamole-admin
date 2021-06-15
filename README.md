## Guacamole Admin
This is Guacamole Admin written in PHP using Laravel 8.x framework and dockerized with Laravel Sail.

## Installation steps

```zsh
# Install composer dependencies
composer install

# Publish .env file
cp .env.example .env

# Generate key for the app
php artisan key:generate

# Migrate the database
php artisan migrate
```
