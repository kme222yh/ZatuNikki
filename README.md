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


### コマンドログ

```
php composer.phar require laravel/breeze --dev
php composer.phar require intervention/image
php composer.pahr require artesaos/seotools
php artisan vendor:publish --provider="Artesaos\SEOTools\Providers\SEOToolsServiceProvider"
php artisan breeze:install
npm install
npm run dev
```
