FROM php:8.4-fpm

# System deps
RUN apt-get update && apt-get install -y \
  git curl zip unzip libpng-dev libonig-dev libxml2-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions (عدل حسب احتياجك)
RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project
COPY . .

# Install deps
RUN composer install --no-dev --optimize-autoloader

# Optimize (اختياري)
RUN php artisan config:cache || true
RUN php artisan route:cache  || true

# Render uses PORT env var
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
