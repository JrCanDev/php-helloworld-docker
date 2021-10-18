FROM php:7.2-nginx
RUN docker-php-ext-install mysqli pdo_mysql
COPY src/ /var/www/html/

EXPOSE 80