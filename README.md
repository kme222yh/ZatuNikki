ざつにっき ZatuNikki
-------

* PHP 8.2
* Laravel 10.x
* Vue.js 3.x
* MariaDB 1:10.11.2+maria~ubu2204

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

開発環境のセットアップ
-------------------

### 起動
```
docker-compose up -d
```

### 開発するとき

```
npm run watch
php artisan serve --host 0.0.0.0
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


セットアップログ
-------

```
# sailによる環境構築
curl -s "https://laravel.build/zatunikki?php=82&with=mariadb,minio,mailpit" | bash

# 起動確認
./vendor/bin/sail up -d
./vendor/bin/sail stop

# sailコマンドのエイリアス設定(shell再起動)
# 以下を~/.zshrcに追記
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

# sailコマンド確認
sail up

# js,cssパッケージ準備
sail yarn install
```
