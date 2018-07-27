# Project-Social-Media


Project of modern Social media site like Facebook / Twitter.

## Motvation

  - I created this project to check my knowledge gained in Laravel courses in practice
  - I wanted to plan a larger application myself without the help of courses or diffrent person.

## Technologies

 - Laravel 5
 - PHP 7
 - Bootstrap 4

## Prerequisites
 - PHP >= 7.1.3
## Setup

 - Download files and use this command in downloaded folder
 ```sh
    composer install
```
 ```sh
    composer dump-autoload
```

 -  Download the Laravel using Composer:
 ```sh
    composer global require "laravel/installer"
```
 - Start local Apache server and MySQL.
 
 - Create new file ".env" and copy the content from ".env.example" edit dbname/password/username.
 
 - Use next commands in downloaded folder:
  ```sh
    php artisan key:generate
```
 - Run the database migrations.
 ```sh
    php artisan migrate
```
 - Start the local development server
 ```sh
    php artisan serve
```
 - You can now access the server at http://localhost:8000

### Author
Łatka Arkadiusz 
 - arkadiusz.latka@o2.pl
 - https://www.linkedin.com/in/arkadiusz-%C5%82atka-873560164/


### Todos

 - Write Tests
 - Add Javascript

