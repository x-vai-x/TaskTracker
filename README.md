# Installation

## Install Laravel.
https://herd.laravel.com/docs/macos/getting-started/installation

## Install Node.
https://nodejs.org/en/download


## Install PHP dependencies.
1. Navigate to project directory.
2. Run composer install in the command line.

## Install node dependencies.
1. Navigate to project directory.
2. Run npm install in the command line.

## Install MySQL.
https://dev.mysql.com/downloads/installer/

# Database setup
1. Connect to MySQL instance with host 127.0.0.1 and port 3306.
2. Create user with username root and without a password.
3. Create database task_tracker.
4. Create .env file, ensuring all variables are defined as in .env.example.
5. Navigate to project directory.
6. Run php artisan migrate in the command line.
7. Run php artisan db:seed in the command line.

# Running project

## Build project.
Run npm run build in the command line.

## Start Laravel application.
Run php artisan serve in the command line.




