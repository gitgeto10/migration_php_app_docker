FROM php:7.4-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Ajouter une ligne pour définir le ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copier le fichier de configuration Apache personnalisé
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Exposer le port 80
EXPOSE 80

# Démarrer Apache
CMD ["apache2-foreground"]
