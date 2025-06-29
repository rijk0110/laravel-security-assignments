FROM php:8.2-apache

# Installeer afhankelijkheden
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Laravel project naar /var/www/html kopiëren
COPY . /var/www/html

# Zorg dat composer aanwezig is
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Installeer afhankelijkheden van Laravel
RUN composer install --no-dev --optimize-autoloader \
    && cp .env.example .env \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# Geef rechten aan Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Zet de juiste Apache DocumentRoot naar public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Pas de Apache config aan
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

EXPOSE 80
