FROM php:7.3-apache
WORKDIR /var/www/html
RUN apt-get_update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli