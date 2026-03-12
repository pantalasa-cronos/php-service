FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    zip unzip git \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/local/bin/composer /usr/local/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --optimize-autoloader

COPY . .

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
