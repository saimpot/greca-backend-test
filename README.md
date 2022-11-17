# Greca - Bookings API

## About

This repository contains the implementation of a RESTful API
written in Laravel by George Chatzipavlou (github.com/saimpot/)
for the Backend Assignment from Greca.
The backend framework used for this assignment is Laravel (9.X).

## Prerequisites

* PHP 8.1
* PostgreSQL
* PostgreSQL PHP Driver ([Click](https://stackoverflow.com/questions/10640821/how-do-i-enable-php-to-work-with-postgresql/) for more info)
* A role in the db, preferably called `greca` (It's your choice really, just make sure to update it on `.env`)
* A collection in the db, preferably called `greca` (It's your choice really, just make sure to update it on `.env`)

## Installation Instructions

* Clone the repository from GitHub using the `git clone` command.
* Then use `composer install` to install all dependencies.
* Copy `.env.example` file by using `cp .env.example .env`.
* Run `php artisan key:generate` to generate a secure application key.
* Open newly created `.env` file search for `{{CHANGE_ME}}` string and change all the occurrences to the required values.
* Before you run the following commands, you might want to take a look at `App\Constants\BookingConstants.php` file 
* and maybe change the default values to something you like more.
* Run `php artisan migrate`
* Run `php artisan db:seed`
* Import `postman_collection.json` which is found in the root
  folder of the project into Postman

### Postman specific instructions

* On the left tab, called `Environments`, create an Environment
* Select the environment and create the following variables:
    * `url` - You should put as a value
      the corresponding `.env` value for `APP_URL`
* Use the newly created environment by clicking on the part of the UI
  on the upper right bellow the `upgrade` button and left of the `eye icon` and selecting it.

## Main Usage

You can use the endpoints from the imported postman collection to perform operations.

## Considerations

Since performance is important for this assignment, a future improvement would be to
introduce redis both for caching and as a queue. 

### Caching

Redis for caching to improve response times for already stored objects in the cache

### Queue

Redis as a queue because if this is an API, and the hits are REALLY frequent, and since
the nature of PHP is Synchronous (you could get async php, but that is a topic for another discussion)
Then we could use redis as a queue to insert bookings, so the application would not hang while processing.
