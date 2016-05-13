# Laravel / AdminLTE starting template

This is a starter template for laravel with admin-lte template ...

## Install instructions

- *composer install*
- *npm install*
- *npm run gulp*
- *php artisan key:generate*
-
- make sure, your apache2 user has proper access rights:
    *sudo chown -R www-data:www-data project_name*
- create database user and give him access to db
    *create database database_name;*
    *create user user_name;*
    *grant all privileges on database_name.* to user_name@localhost identified by 'db_password'
- *cp .env.example .env* (configure it with the info above ..)
- php artisan migrate

