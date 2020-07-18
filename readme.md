
### Requeriments
Php 7.4^
Composer

### Commands
``$ composer install``

In the root of project, rename the file
 `` .env-example ``
  to:
   ``.env ``

Inside of ``.env``, uncomment and set the fallowing line

``DB_CONNECTION=sqlite``

Enter in the /database folder, from the root of the project

And create a file: ``database.sqlite``

Run the migrations:
``$ php artisan migrate``

Run the server with
``$ php artisan serve``


*Ignore*
// php artisan key:generate TODO: test this command
