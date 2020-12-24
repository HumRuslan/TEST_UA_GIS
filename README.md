Необходимо написать простой блог с использованием требований ниже: 
•	Регистрация/аутентификация/авторизация;
•	Добавление постов разрешено только авторизованым пользователям; после добавления поста, он попадает на модерацию;
•	Страница со всеми постами (на страницу 5 постов и пагинация);
•	Страница отдельного поста;
•	Страница добавления поста;
•	Удобная административная панель (логин — Admin, пароль - Admin123) для модерации новых постов, просмотра всех постов, просмотра отдельного поста, удаления постов;
•	Реализовать API для получение всех постов, получения отдельного поста по ID, добавление нового поста;



Установка windows:
    1. install Virtual Box;
    2. install Vagrant;
    3. разворачиваем Vagrant;

В коробке:
    1. install doker-compose;
    2. разворачиваем doker контейнеры в папке ua-gis/docker:
        - nginx_ua_gis;
        - php_ua_gis;
        - db_ua_gis

Установка ubuntu:
    1. install doker-compose;
    2. разворачиваем doker контейнеры в папке ua-gis/docker:
        - nginx_ua_gis;
        - php_ua_gis;
        - db_ua_gis

Настройки nginx:
    1. ua-gis/docker/backend.conf - backend
    2. ua-gis/docker/frontend.conf - frontend
    3. ua-gis/docker/default.conf - api

Доступ к сайту:
    192.168.83.100	ua-gis
    192.168.83.100	ua-gis-frontend
    192.168.83.100	ua-gis-backend

BD 
    Hostname: 192.168.83.100
    Port: 3309
    User: root
    Password: root

    Dump: ua-gis/core/sql.sql
    Config DB: ua-gis/config/configDB.php

Password salt: ua-gis/config/config.php
    

frontend:
    user: admin
    password: admin123

    password: ua-gis/backend/.htpasswd
API: http://ua-gis/api/post
