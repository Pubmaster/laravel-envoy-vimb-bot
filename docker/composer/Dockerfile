FROM php:7.2.8-alpine

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer config -g github-oauth.github.com f13f56a541a3287caefa996bae1cf589b27e1f21

WORKDIR /var/www
