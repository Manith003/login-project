FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libzip-dev \
    && docker-php-ext-install mysqli

# 🔥 IMPORTANT FIX HERE
RUN pecl install mongodb-1.21.1 redis \
    && docker-php-ext-enable mongodb redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "frontend/public"]
