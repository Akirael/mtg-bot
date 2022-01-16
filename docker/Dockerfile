FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        libmcrypt-dev \
        libmemcached-dev\
        libmemcached-tools\
        libzip-dev\
        libyaml-dev\
        libpq-dev\
    && pecl install memcached\
    && docker-php-ext-enable memcached\
    && docker-php-ext-install sockets\
    && docker-php-ext-enable sockets\
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && rm -rf /tmp/pecl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]
