FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql \
    && printf '%s\n' \
    '<VirtualHost *:80>' \
    '    DocumentRoot /var/www/html' \
    '    <Directory /var/www/html>' \
    '        AllowOverride None' \
    '        Require all granted' \
    '        FallbackResource /index.php' \
    '    </Directory>' \
    '</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
COPY backend.php /var/www/html/index.php

EXPOSE 80
