# CQRS in a simple app implemenging Ports & Adapters architecture

This project can be used as a skeleton if you need a basic setup to work with the Ports & Adapters architectural pattern + CQRS + symfony + docker setup (php7.4, MysQL, Apache)

## Relevant packages included:
- [Symfony Messenger component](https://packagist.org/packages/symfony/messenger)
- [PHPUnit](https://packagist.org/packages/phpunit/phpunit)
- [Ramsey/Uuid](https://packagist.org/packages/ramsey/uuid)

### How does it work
**It uses:**
- Command + CommandHandler to add a baby height record through a symfony form.
- Query + QueryHandler to retreive the list of Heights from the database.

### Docker · Apache · PHP-FPM · MySQL
Thanks to a simple docker setup included you can run this project in local:

- Start (build/rebuild) containers:
  ```docker-compose up -d```

- Install dependencies from inside the container:
  
  ```
  docker-compose exec php-fpm /bin/bash
  ```
  
  ```
  composer install
  ```

- Go to localhost on the browser to see how it works.
