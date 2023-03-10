:start

@echo off

echo Installing Composer Dependencies

call composer install

echo Installing Node Modules

call npm install

echo Compiling Node Modules

call npm run dev

echo Creating .env File

call php -r "file_exists('.env') || copy('.env.example', '.env');"

echo Generating Application Key

call php artisan key:generate

echo Creating MySQL Database

call mysql -u root --password="" -e "CREATE DATABASE IF NOT EXISTS %%1"

echo Modifying environment variables

call php setup.php %1

echo Creating Storage Symlink

call php artisan storage:link

echo Migrating and Seeding Database

call php artisan migrate --seed

echo Opening Project

code .

:end
