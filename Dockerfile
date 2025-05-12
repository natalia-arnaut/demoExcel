FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN apt-get update \
  && apt-get -y install curl\
  && apt-get install -y \
            libzip-dev \
            zip \
  && docker-php-ext-install zip pdo pdo_mysql sockets\
  && apt-get install -y git\
  && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd


COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . .
