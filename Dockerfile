FROM php:7.2-apache

EXPOSE 80

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y --no-install-recommends \
        nano \
        #cron \
        wget \
        curl \
        libusb-dev \
        libgtk2.0-dev \
        libcurl3 \
        libcurl3-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
    && a2enmod rewrite expires status \
    # && ln -s /dev/stderr /var/log/php.error \
    && docker-php-ext-install \
        curl \
        exif \
        gd \
        hash \
        iconv \
        mbstring \
        mysqli \
        sockets \
        session \
        opcache \
        intl