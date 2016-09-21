FROM php:5.6-apache

MAINTAINER Eric Dupertuis <eric.dupertuis@generalmedia.com>

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install curl nano vim -y

RUN mkdir -p /var/www/html/web

# Install PDO MySQL driver
# See https://github.com/docker-library/php/issues/62
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

ADD app/config/apache.conf /etc/apache2/sites-available/000-default.conf

# Apache & PHP configuration
RUN a2enmod rewrite headers ssl deflate expires