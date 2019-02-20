FROM php:5.6-fpm


RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN docker-php-ext-install mysqli
RUN mkdir -p /workdir/uploads && chmod 777 /workdir/uploads

WORKDIR /workdir
