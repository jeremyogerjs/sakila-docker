#synthax=docker/dockerfile:1
FROM php:7.3-apache
RUN docker-php-source extract \
    docker-php-ext-install pdo pdo_mysql \
    && docker-php-source delete
COPY . /var/www/html

EXPOSE 8000/tcp
CMD ["php","./index.php"]