# pixarron-order
This is my Test App for Pixarron Tech Test
## Installation Guide
First, clone this repository from
### Install dependencies and setup Database
$ composer install
$ npm install
$ npm run dev
$ php artisan migrate:refresh --seed
### Setup Passport
$ php artisan passport:client --password
### Fill Database with External Posts data
Run the following command to fill database with posts data
$ php artisan get:posts
### Serve application
$ php artisan serv
## User Credentials
In order to gain access to Admin Panel, you need to use the following credentials:
**user** tetolivares@gmail.com
**password** 1234
For API Access you may use the following:
**user** cliente@gmail.com
**password** password
## How to consume API
Make a POST request to /oauth/token following these instructions:
https://laravel.com/docs/8.x/passport#requesting-password-grant-tokens