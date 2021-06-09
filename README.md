## Guacamole Admin
This is Guacamole Admin written in PHP using Laravel 8.x framework and dockerized with Laravel Sail.

## Installation steps

```zsh
# Install composer dependencies
composer install

# Publish .env file
cp .env.example .env

# Start Laravel Sail
./vendor/bin/sail up -d

# Generate key for the app
./vendor/bin/sail art key:generate

# Migrate the database
./vendor/bin/sail art migrate
```