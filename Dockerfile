FROM php:8.1-apache

# Install system dependencies for required extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP extensions for Revive AdServer
RUN docker-php-ext-install pdo_pgsql pgsql mysqli zip

# Enable Apache mod_rewrite and headers
RUN a2enmod rewrite headers

# Configure basic PHP settings for Revive AdServer
RUN echo "file_uploads = On" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "upload_max_filesize = 10M" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "post_max_size = 10M" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "display_errors = Off" >> /usr/local/etc/php/conf.d/revive-adserver.ini \
    && echo "log_errors = On" >> /usr/local/etc/php/conf.d/revive-adserver.ini

# Set working directory
WORKDIR /var/www/html 