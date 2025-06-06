## Notes about the test

I have tried to stay away as most as humanly possible from the css libraries included in Laravel as per requirements.

The cart fetched is always the same in the database as there is no notion at the moment of creating a cart based on the current customer session.

## Technologies Used

- Laravel 12 for the base Framework
- Laravel Herd for PHP (8.4), Node (24.1), and local server
- PHPStorm
- SQLite for the database (provides the least amount of headaches for everyone)

## Installation Instructions

- Install Herd (if required)
- Pull the project on your computer
- in the root folder, run the following
  - composer install
  - copy .env.example .env
  - php artisan key:generate
  - php artisan migrate
  - npm install
  - npm run build
- Navigate to the URL you will have given the project
- Done!

## Additional Information 

If you want to go back to the original state of the database, run the following:

- php artisan migrate:fresh

ps. I know that quantity update popup is horrendous :)
