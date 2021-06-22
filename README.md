## ecommerce-01

## install dependencies
$ composer install 


## Create a copy of your .env.example file to .env
$ cp .env.example .env 

## Generate an app encryption key
$ php artisan key:generate

## Create an empty database for our application and then In the .env file, add database information to allow Laravel to connect to the database
$ DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD 

## Migrate the database
$ php artisan migrate

## Seed the databas
$ php artisan db:seed

## make a storage link , If nedded
$ php artisan storage:link
