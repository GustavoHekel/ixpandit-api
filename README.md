## Instructions
Make sure that you create a .env file at the root of the project.

There's a .env.example with the API uri from which the data will be fetched (change it if needed). You can just copy the file and name it .env

After that just run 

### `composer install`

it will install all Laravel's dependencies

### `sudo chgrp -R www-data bootstrap/cache`
### `sudo chgrp -R www-data storage`

To set proper permissions

### `php artisan serve`

It will start a server on http://127.0.0.1:8000
