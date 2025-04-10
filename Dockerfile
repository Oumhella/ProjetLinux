FROM php:8.1-fpm

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    mariadb-server \
    supervisor \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring gd xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure MySQL
RUN mkdir -p /var/run/mysqld && chown -R mysql:mysql /var/run/mysqld
RUN mkdir -p /var/lib/mysql && chown -R mysql:mysql /var/lib/mysql

# Configure Nginx
COPY ./docker/nginx/default.conf /etc/nginx/sites-available/default

# Configure Supervisor
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Copy Laravel application
COPY . .

# Permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose ports
EXPOSE 80 3306

# Command
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
