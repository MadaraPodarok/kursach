#!/usr/bin/env bash

cd /var/www # Переход в рабочую директорию

#if [ ! -z "$WWWUSER" ]; then
#    usermod -u $WWWUSER www
#fi
#
#if [ ! -d /.composer ]; then
#    mkdir /.composer
#fi

chmod -R ugo+rw /.composer
chmod -R 777 ./storage/
chown -R www:www ./
php-fpm -RD

composer install # Установка пакетов Composer
php artisan migrate --seed --force # Накатываем миграции и сиды
#nohup php artisan queue:work --daemon > ./storage/logs/worker.log & # Запуск воркера
#php-fpm # Запускаем основной процесс контейнера

supervisord -n
