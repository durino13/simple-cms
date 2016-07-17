# Laravel / AdminLTE starting template

This is a starter template for laravel with admin-lte template ...

## Install instructions

- *composer install*
- *npm install*
- *npm run build*
- *php artisan key:generate*
- make sure, your apache2 user has proper access rights:
    *sudo chown -R www-data:www-data project_name*
- create database user and give him access to db
    *create database database_name;*
    *create user user_name;*
    *grant all privileges on database_name.* to user_name@localhost identified by 'db_password'
- *cp .env.example .env* (configure it with the credentials entered in .env file ..)
- php artisan migrate


## Repository structure

- create empty repository, which will install the 'cms' ad dependency
- if laravel is used for frontend too, I will not share the model classes, I will have to configure everything twice
- the 'cms' repository will be shared among several projects, if change is done into 'cms', after composer update
  it will be installed in all repositories
- if a web will need a custom functionality, I will need to implement a 'module/plugin' functionality

- site (custom framework can be used, laravel, or something else ..)
-- administrator (composer 'cms' repo)
.htaccess (will redirect all 'administrator' requests into administrator folder)
index.php

