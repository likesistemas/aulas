FROM php:7.3-fpm
RUN apt-get update && apt-get install -y mariadb-client
RUN docker-php-ext-install pdo pdo_mysql
COPY www/ /var/www/html/