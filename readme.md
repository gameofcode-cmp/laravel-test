# Installation
On first run execute the following steps to install dependencies and seed the initial database. This only needs to be done once.

1. Bring up docker containers

    ```docker-compose up -d```

2. Install laravel and dependencies to container

    ```docker exec toucan-app sh -c "cd ./toucan-app && composer install"```
3. Set ownership to web process

    ```docker exec -d toucan-app chown www-data:www-data -R /var/www```
4. Create database

    ``docker exec toucan-db sh -c "mysql -uroot -pdocker -e  'CREATE DATABASE toucan;'"``
5. Seed database

    ``docker exec toucan-app sh -c "cd ./toucan-app && php artisan migrate"``

# Running
Once installed app can be launched with:

``docker-compose up -d``

From inside the docker folder (or with path to docker-compose.yml)

# Notes

- Adminer is included to admin db (localhost:8088 user:root pw:docker)

