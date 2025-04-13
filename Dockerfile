# Dockerfile
FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer (ajoute ça)
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
