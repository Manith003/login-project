FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libzip-dev \
    && docker-php-ext-install mysqli

# Install PECL extensions (MongoDB & Redis)
RUN pecl install mongodb redis \
    && docker-php-ext-enable mongodb redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose Render port
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "frontend/public"]
