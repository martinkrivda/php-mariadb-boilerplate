FROM php:8.5-fpm-alpine

RUN apk add --no-cache nginx supervisor git unzip \
  && docker-php-ext-install pdo pdo_mysql \
  && mkdir -p /run/nginx /var/log/supervisor

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

COPY composer.json /var/www/app/composer.json
WORKDIR /var/www/app
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress

COPY app /var/www/app

EXPOSE 80

CMD ["/start.sh"]
