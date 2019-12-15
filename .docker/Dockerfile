FROM php:7.2-apache

WORKDIR /var/www/html/

## Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libpq-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
#
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#
## Install extensions
RUN docker-php-ext-install pdo pdo_mysql exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd


#Rename php.ini
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#Configure sites Apache
COPY php/configs/apache2.conf /etc/apache2/apache2.conf
COPY php/configs/cartorio.conf /etc/apache2/sites-available/cartorio.conf

#Disable Config default Apache
RUN a2dissite 000-default.conf

#Enable mod rewrite Apache
RUN a2enmod rewrite

#Enable sigtv.conf
RUN a2ensite cartorio.conf

RUN groupadd -r www && useradd -r -g www www

RUN chown -R www:www /var/www

#Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer