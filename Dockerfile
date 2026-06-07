FROM php:8.4.5-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/