This task was build using [lumen](https://lumen.laravel.com/docs/5.8) 5.8 (laravel micro framework)
# Steps to run The project

- git clone of the master branch
- run composer install
- renaming .env.example to .env which contains json file path at key(HOTELS_FILE_PATH).
- run composer dump-autoload
- run php -S localhost:8000
- you can find json file at storage directory

# Endpoints

- search for hotels at all providers (http://localhost:8000/api/hotel/search)
- search for hotels at bestHotels provider (http://localhost:8000/api/hotel/bestHotels)
- search for hotels at topHotels provider (http://localhost:8000/api/hotel/topHotels)

# Testing

- for windows run vendor\bin\phpunit
- for mac run vendor/bin/phpunit


# License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
