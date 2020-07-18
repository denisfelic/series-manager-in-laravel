###Requeriments

php 7.4^

composer  

###Commands

$ composer install

change the file .env-example to .env 

in the .env file, uncomment and set the fallowing line

DB_CONNECTION=sqlite

cd /database 

create a file: database.sqlite

$php artisan migrate

$php artisan serve


// php artisan key:generate TODO: test this command

