FROM php:7.4-apache
RUN docker-php-ext-install mysqli pdo_mysql
COPY src/ /var/www/html/

EXPOSE 80