Laravel Database Tables Clear Command
====================================

Laravel artisan command to drop all database tables and rerun the migrations.

Tested with Laravel 5 and Laravel 5.1


Installation and usage
----------------------


>Add composer dependency:

```php

composer require abhijitghogre/laravel-db-clear-command dev-master

```


>Add the service provider in your config/app.php file:

```php

<?php

return [

    ...

    'providers' => [

        ...

        'Abhijitghogre\LaravelDbClearCommand\LaravelDbClearCommandServiceProvider',

    ],

];

```


>Run the command

```php

php artisan db:clear

```


The command switches off foreign key check, drops all the tables and re-runs your migrations.


>Optionally, pass ```--seed``` option to run the seeders post migration

```php

php artisan db:clear --seed

```
