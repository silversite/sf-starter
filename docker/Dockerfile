FROM php:7.1-apache

# Apache configuration
ADD docker/apache2.conf /etc/apache2/apache2.conf
ADD docker/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD docker/symfony.ini /usr/local/etc/php/conf.d/symfony.ini

COPY . /var/www/html
# PHP Extension
RUN apt-get update \
        && apt-get install --assume-yes apt-utils \
        && apt-get install -y libicu-dev git \
        && apt-get install -y mc \
        && apt-get install -y nano \
        && apt-get install -y zip unzip \
        && apt-get install -y libfreetype6-dev \
        && apt-get install -y libjpeg62-turbo-dev \
        && apt-get install -y libmcrypt-dev \
        && apt-get install -y libpng12-dev \
        && apt-get clean \
        && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql exif opcache intl \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && a2enmod rewrite && service apache2 start

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN usermod -u 1000 www-data && chown -R www-data:www-data /var/www/html/var/cache \
    && chown -R www-data:www-data /var/www/html/var/logs

