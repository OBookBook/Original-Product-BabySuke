FROM php:8.3-apache

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

RUN composer self-update --2

RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    vim \
    libpng-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

RUN docker-php-ext-configure gd \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include \
    && docker-php-ext-install -j$(nproc) gd

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN service apache2 restart

RUN chmod -R 777 /var/www/html/
RUN chmod -R gu+w /var/www/html/

WORKDIR /var/www/html

RUN echo "Listen 8080" >> /etc/apache2/ports.conf

RUN a2enmod rewrite