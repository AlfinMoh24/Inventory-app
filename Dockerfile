FROM php:8.2-apache

# Install ekstensi PHP termasuk GD
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip


# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin project ke dalam container
COPY . /var/www/html

WORKDIR /var/www/html

# Permission untuk Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Jalankan Composer install
RUN composer install --no-dev --optimize-autoloader

# Apache virtual host
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Jalankan Apache
CMD ["apache2-foreground"]
