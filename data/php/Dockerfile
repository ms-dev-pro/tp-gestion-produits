FROM php:5.6-fpm


RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN docker-php-ext-install mysqli
WORKDIR /workdir
