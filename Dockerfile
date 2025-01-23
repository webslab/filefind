##
FROM composer:lts AS composer

WORKDIR /app

COPY ./composer.json /app/composer.json
COPY ./composer.lock /app/composer.lock

RUN composer install --ignore-platform-req=ext-gd

##
FROM php:8.1-fpm-alpine
# RUN apk add --no-cache libpng-dev libjpeg-turbo-dev libwebp-dev libxpm-dev libvpx-dev
RUN apk add --no-cache libpng-dev libwebp-dev
RUN docker-php-ext-install gd

#ADD docker/php.ini /usr/local/etc/php/php.ini
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# RUN echo "upload_max_filesize=10G" >> "$PHP_INI_DIR/php.ini"
# RUN echo "post_max_size=10G" >> "$PHP_INI_DIR/php.ini"
# RUN echo "memory_limit=512M" >> "$PHP_INI_DIR/php.ini"
RUN echo "upload_max_filesize=200M" >> "$PHP_INI_DIR/php.ini"
RUN echo "post_max_size=200M" >> "$PHP_INI_DIR/php.ini"
RUN echo "memory_limit=256M" >> "$PHP_INI_DIR/php.ini"
RUN echo "expose_php=Off" >> "$PHP_INI_DIR/php.ini"

WORKDIR /app

COPY ./*.php /app
COPY --from=composer /app/vendor /app/vendor

RUN mkdir -p /app/resources
RUN chown -R www-data:www-data /app
