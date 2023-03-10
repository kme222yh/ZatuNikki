ざつにっき ZatuNikki
-------

* PHP 8.2
* Laravel 10.x
* Vue.js 3.x
* MariaDB 1:10.11.2+maria~ubu2204



### 起動
```
sail up
# または
sail up -d
```

### 停止
```
sail stop
```

### viteサーバー起動
```
sail npm run dev
```



セットアップログ
-------

```
# 参考
# https://zenn.dev/imah/articles/5d761f8f8c26fe
# https://laravel.com/docs/10.x/sail
# https://laravel.com/docs/10.x/vite
# https://laravel.com/docs/10.x/starter-kits


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

# 認証用パッケージ導入 breeze
# 多分ここでtailwindCssが入ってる
sail composer require laravel/breeze --dev
sail art breeze:install
sail art migrate
sail npm install

# vue3準備
sail npm install --save-dev @vitejs/plugin-vue
sail npm install
```
