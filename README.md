
## This is a Laravel Test For Pivotal Agency

This documentation describes how to download, install and use the API.


## Download and Installation

```php
# Clone this repository
$ git clone https://github.com/andrefloquet/test.laravel.pivotal2.git

# Go to the repository
$ cd test.laravel.pivotal2

# Install dependencies
$ composer install

# Update Settings
-Rename the .env.example file to .env 

-Create a new database called podcast and update .env file. 
(For instance, if you're going to use Mysql, change this line on .env file 
to DB_CONNECTION=mysql and DB_DATABASE=podcast)

-generate an app key
$ php artisan key:generate

# Migrate Database (create tables and fake data)
$ php artisan migrate:fresh --seed

# Run the app
$ php artisan serve

# (Optional) Run tests 
$ php artisan test
```

## Usage

https://gold-star-826597.postman.co/workspace/b0a6dbc8-281d-4ae6-aee1-912822cbc44f/documentation/17825473-e8efebdc-f3da-4bc2-b489-74059d0fe731?entity=&branch=&version=


## License

This API is open-sourced software licensed and everyone can use and modify it.
