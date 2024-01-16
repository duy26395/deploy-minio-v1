FROM php:8.1-fpm

COPY . /var/www/html
# RUN apt-get update && apt-get install -y
    # libzip-dev \
    # libpng-dev \
    # libpq-dev \
    # libonig-dev \
    # libxml2-dev \
    # && docker-php-ext-install -j$(nproc) zip gd \
    # && docker-php-ext-enable zip gd

# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php composer-setup.php
# RUN php -r "unlink('composer-setup.php');"
# RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html