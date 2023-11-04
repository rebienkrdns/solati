## Prerequisites:

- php installed version ^8.1
- postgres installed and running on localhost
- enable required extension pdo_pgsql

## Run steps:

- clone repository
- cp .env.example .env
- composer install
- php artisan key:generate
- php artisan jwt:secret
- check http://localhost if everything is OK you will get this approximate answer:

> **Solati test: v10.30.1 PHP v8.1.10**

## Documentation:

- [Postman documentations](https://documenter.getpostman.com/view/3635509/2s9YXe953c).

<iframe width="700" height="700" src='https://documenter.getpostman.com/view/3635509/2s9YXe953c'> </iframe>