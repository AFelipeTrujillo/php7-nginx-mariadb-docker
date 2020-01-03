# PHP7 + Nginx + Mariadb + Docker

## Components

- PHP 7: Programming language
- Nginx: Application server
- Mariadb: Database engine
- Docker: Container environment

## Docker compose

```
version: '3.1'
services:
    web:
        image: nginx:latest
        restart: always
        ports:
            - "8080:80"
        volumes:
            - ./app:/app
            - ./site.conf:/etc/nginx/conf.d/site.conf
            - ./logs:/var/log/nginx/
        links:
            - php
    
    php:
        build: '.'
        restart: always
        volumes:
            - ./app:/app
        env_file:
            - .env
        links:
            - db

    db:
        image: mariadb
        restart: always
        env_file:
            - .env
        volumes:
            - ./data:/var/lib/mysql
    
    adminer:
        image: adminer
        restart: always
        ports:
            - 8081:8080            
```
## Edit the /etc/hosts file

Add the next line

```
127.0.0.1 php-docker.local
```

## How to run

1. Install [docker compose](https://docs.docker.com/compose/install/)
2. Clone the repository ```git clone https://github.com/AFelipeTrujillo/php7-nginx-mariadb-docker.git```
3. Enter to the folder ```cd php7-nginx-mariadb-docker```
4. Run ```docker-compose up``` inside the folder project
5. Go to http://php-docker.local:8080/test_db.php

## How to chage the database credetials

Plase, go to **.env** file and edit.

```
MYSQL_DATABASE=db
MYSQL_USER=user_db
MYSQL_PASSWORD=pass_db
MYSQL_ROOT_PASSWORD=U59b2)q5})>^#`7;
```
