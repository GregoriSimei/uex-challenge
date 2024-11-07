FROM php:8.3-cli-alpine

WORKDIR /home/app/setup

RUN apk --update upgrade

## composer configuration
COPY .docker/php .
RUN ./composer-config.sh && rm -f ./composer-config.sh

## postgres configuration
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo_pgsql pgsql

## install laravel
RUN composer global require laravel/installer
ENV PATH="$PATH:/root/.composer/vendor/bin"

WORKDIR /home/app/php

CMD tail -f /dev/null