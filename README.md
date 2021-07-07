ざつにっき ZatuNikki
-------

* PHP 7.4
* Laravel 8.x
* MySql 5.6
* Vue.js 2.5

セットアップ
-------------------

```
php composer.phar require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
php artisan migrate
php artisan migrate:fresh --seed

composer require encore/laravel-admin
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```

### コマンド

```
npm run watch
```
