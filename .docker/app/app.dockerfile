FROM php:8.3-fpm

ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libsodium-dev \
    libpq-dev

RUN pecl install xdebug-3.3.1 
RUN docker-php-ext-install pdo_pgsql
ADD ./.docker/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g $GID appgroup \
    && useradd -u $UID -g $GID -m appuser

COPY . /var/www/

WORKDIR /var/www/

COPY ./.docker/app/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

USER appuser

EXPOSE 9000
ENTRYPOINT ["/entrypoint.sh"]