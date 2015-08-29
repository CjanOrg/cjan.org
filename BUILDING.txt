# Building CJAN.org

This document describes how to build CJAN.org in your development environment.

## Requirements

* PHP 5.5+
* Composer
* mcrypt
* Laravel
* Envoy
* Docker mysql:5.5 container
* git-core

## Building

You can download the dependencies with composer

`composer install`

Or update your environment

`composer update`

Create the Docker MySQL container

`docker run -p 3306:3306 --name cjan-mysql -e MYSQL_ROOT_PASSWORD=admin -e MYSQL_DATABASE=cjan -d mysql:5.5`

Alternatively, if you already have the container created

`docker start cjan-mysql`

Create the database

`php artisan migrate:install && php artisan migrate --seed`

And run the project locally with

`php artisan serve`

And finally go to http://localhost:8000 and browse CJAN.org running locally.

## Deploying

Deployment is done with [Laravel Envoy](http://laravel.com/docs/5.0/envoy). You can simply build and deploy
the project by running the following command (assuming you have already installed Envoy):

`envoy run deploy`

You should get some output similar to:

```
[root@cjan.org]: From https://github.com/CjanOrg/cjan.org
 * branch            master     -> FETCH_HEAD
[root@cjan.org]: Already up-to-date.
[root@cjan.org]: Loading composer repositories with package information
[root@cjan.org]: Installing dependencies (including require-dev) from lock file
[root@cjan.org]: Nothing to install or update
[root@cjan.org]: Generating autoload files
[root@cjan.org]: Generating optimized class loader
[root@cjan.org]: Compiling common classes
```
