FROM php:5.6-fpm


RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN docker-php-ext-install mysqli
RUN pecl install redis && docker-php-ext-enable redis
WORKDIR /workdir
