FROM php:8.3-apache
ENV TZ="Europe/Paris"

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

COPY ./install-composer.sh ./

RUN a2enmod rewrite

RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \
    -y --no-install-recommends

RUN docker-php-ext-install pdo_mysql

COPY ./php.ini /usr/local/etc/php/

RUN apt-get purge -y g++ && \
    apt-get autoremove -y && \
    rm -r /var/lib/apt/lists/* && \
    rm -rf /tmp/* && \
    sh ./install-composer.sh && \
    rm ./install-composer.sh

WORKDIR /var/www/public

RUN chown -R www-data:www-data /var/www

CMD ["apache2-foreground"]