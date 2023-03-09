FROM php:8.2-fpm AS production

# The following line adds the required extensions
RUN apt-get update && apt-get install -y libxslt-dev libzip-dev openssl wget && docker-php-ext-install xsl calendar zip mysqli pdo_mysql


FROM production AS dev

# Add some dev tools
RUN apt-get install -y nano zip unzip

# Enable xdebug
RUN pecl install xdebug-3.2.0  && docker-php-ext-enable xdebug #3.0.0 for php8.0 compatibility
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# Composer
RUN wget https://getcomposer.org/download/latest-stable/composer.phar
RUN mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer


# Unix only - set permissions
# RUN chown -R www-data:www-data /var/www/ \
