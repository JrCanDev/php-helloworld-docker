FROM php:7.0-apache
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get update\
    && apt-get install -y php7.0-mysql\
    && docker-php-ext-install mysqli pdo_mysql
COPY src/ /var/www/html
EXPOSE 80