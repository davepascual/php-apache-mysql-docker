

# Dockerized PHP, Apache, MySQL
Simple Docker configured PHP, Apache and MySQL image for legacy codebase.

Included image
- php:5.4-apache
- mysql:5.6

> This image included a demo of simple php script with image upload and saving data in MySQL databse.


## Initialized `.env` file

Copy `.env-example` as `.env`
```console
cp .env-example .env
```

## Running image


Initialize docker image.

```console
docker compose up
```


## Importing demo database

Show all running containers.
```console
docker ps
```

Access container's terminal

```console
docker exec -it <container> //bin/sh
```

Import `db_demo.sql` file to the database.
```console
mysql -u <MYSQL_ROOT_USER> -p <MYSQL_DATABASE> < ./mysql/dump/db_demo.sql
```

> Importing sql file to database is necessary when you access the `index.php`.


## Configuring environment variables

MySQL configuration.

Check [MySQL| Docker Hub](https://hub.docker.com/_/mysql/) documentation for more information.
```console
# MYSQL 
MYSQL_ROOT_USER=root
MYSQL_ROOT_PASSWORD=toor
MYSQL_DATABASE=database_name
MYSQL_USER=user 
MYSQL_PASSWORD=pass

MYSQL_PUBLIC_PORT=3306

```


Apache configuration.
```console
# APACHE
PHP_APACHE_APP_PORT=80
```
