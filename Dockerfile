FROM php:8.2-apache
RUN apt-get update \
    && apt-get -y install locales \
    && apt-get -y install gettext \
    && apt-get -y install poedit \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen \
    && sed -i -e 's/# en_US ISO-8859-1/en_US ISO-8859-1/' /etc/locale.gen \
    && sed -i -e 's/# en_US.ISO-8859-15 ISO-8859-15/en_US.ISO-8859-15 ISO-8859-15/' /etc/locale.gen \
    && dpkg-reconfigure --frontend=noninteractive locales \
    && update-locale
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql gettext
RUN docker-php-ext-enable pdo pdo_pgsql gettext
EXPOSE 80
