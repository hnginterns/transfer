FROM php:7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client \
&& docker-php-ext-install mcrypt pdo_mysql

RUN apt-get install -y unzip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer
    
WORKDIR /var/www


COPY . /var/www


