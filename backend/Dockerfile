FROM php:8.2.25-cli-alpine

WORKDIR /home/app/setup

RUN apk --update upgrade

## install composer
COPY .docker/php/composer-config.sh ./setup-composer.sh

RUN chmod +x ./setup-composer.sh
RUN ./setup-composer.sh && rm -f ./setup-composer.sh


## install laravel
RUN composer global require laravel/installer
ENV PATH="$PATH:/root/.composer/vendor/bin"

WORKDIR /home/app/php

CMD tail -f /dev/null