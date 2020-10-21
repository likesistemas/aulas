FROM php:7.3-apache
RUN apt-get update && apt-get install -y mariadb-client
RUN docker-php-ext-install pdo pdo_mysql
COPY index.php /var/www/html/