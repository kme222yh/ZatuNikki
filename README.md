ざつにっき ZatuNikki
-------

* PHP 7.4
* Laravel 8.x
* Vue.js 3.x
* MySql 5.6

セットアップ
-------------------

```
npm install
npm run dev
composer install
php artisan migrate

php artisan migrate:fresh --seed

composer require encore/laravel-admin
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```

### 開発するとき

```
npm run watch
php artisan serve --host 0.0.0.0
```

### DB更新するとき

```
php artisan make:migration add_{column_name}_to_{table_name}_table --table={table_name}
https://qiita.com/usaginooheso/items/6f307a15b5f7d5dd981f
```

### DBリフレッシュするとき（シードも）

```
php artisan migrate:refresh --seed
php artisan admin:install
```


### コマンドログ

```
php composer.phar require laravel/breeze --dev
php artisan breeze:install

php composer.phar require intervention/image

php composer.pahr require artesaos/seotools
php artisan vendor:publish --provider="Artesaos\SEOTools\Providers\SEOToolsServiceProvider"

php composer require encore/laravel-admin
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install

npm install
npm run dev
```
