# Рабочий образ
FROM php:8.1-fpm

WORKDIR /var/www

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y --no-install-recommends \
    cron \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libmagickwand-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    libpq-dev \
    nano \
    libzip-dev \
    curl \
    supervisor

# Чистим кеш APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#Необходимо сконфигурировать расширение pgsql перед установкой, поскольку в конейнере нет Postgres, конфигурируется с фейковым юзером
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl sockets
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install intl
RUN docker-php-ext-install gd
RUN pecl install imagick
RUN docker-php-ext-enable imagick

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --1 && chmod +x /usr/local/bin/composer
# Добавлям пользователя для приложения
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash/ --no-user-group -g www www

# Открываем 9000 порт под FPM и запускаем PHP-FPM сервер
EXPOSE 9000
CMD ["bash", "-c", "./docker/php/entrypoint.sh"]
