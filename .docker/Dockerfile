FROM php:7.2-apache

MAINTAINER Valentyn Saik

COPY . /srv/app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /srv/app

RUN apt-get update
RUN a2enmod rewrite
RUN a2enmod headers

# ZIP + ZLIB
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

RUN apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev
RUN docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir \
    && docker-php-ext-install gd

RUN apt-get install -y libpq-dev \
    && docker-php-ext-install mbstring pdo pdo_mysql mysqli \
    && chown -R www-data:www-data /srv/app