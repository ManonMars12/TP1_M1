FROM nginx:stable

# Installer PHP-FPM et extensions
RUN apt-get update && apt-get install -y \
    php-fpm8.2 php-mysql php-cli php-curl php-mbstring \
    && rm -rf /var/lib/apt/lists/*

# Copier la config NGINX
COPY nginx.conf /etc/nginx/nginx.conf

# Copier le code

# Exposer le port
EXPOSE 80

# Lancer PHP-FPM et NGINX
CMD ["sh", "-c", "php-fpm -F & nginx -g 'daemon off;'"]
