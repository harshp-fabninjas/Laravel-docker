FROM php:8.2-cli

# Install BusyBox, supervisor, and cron
RUN apt-get update && apt-get install -y unzip zip curl git libzip-dev \
    busybox \
    supervisor \
    cron \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy everything
COPY . .

# Set permissions
RUN chmod -R 775 /var/www/storage

# Copy supervisor config
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup cron job
RUN echo "* * * * * cd /var/www && busybox sh -c '/usr/local/bin/php artisan schedule:run >> /var/www/storage/logs/cron.log 2>&1'" | crontab -

EXPOSE 80

# Start supervisor
CMD ["/usr/bin/supervisord", "-n"]
