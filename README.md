Skycop PHP app
========================

### Prerequisites

* You should have docker docker-compose on your localhost.
* That's about it.

### Installation

```
cd .docker
docker-compose build // If you have some other images build from php nginx or mariadb
docker-compose up -d
docker-compose exec php-fpm bash install.sh
```

Webpage can be found at [localhost](http://localhost)

### Tech stack
* Docker - for local dev env.
* Mariadb - RDBMS
* PHP-FPM7.2 - Stands for PHP.
* Nginx - Webserver
* Symfony - as PHP framework.
* FOS\UserBundle - for managing users.
* [bulma.io](http://bulma.io) - as CSS framework

### Real life improvements
* Separate bundle for EventLogger.
* Separate bundle for Auth.
* Disable login/register routes for authenticated user.
* I would use symfony (or any other framework) as micro-service with oAuth2, write swagger annotations and develop SPA app. 
* Tests, tests, tests.