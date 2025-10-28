# Cooking App

このアプリケーションは、Laravelフレームワークを使用して構築されたシンプルな料理レシピ管理アプリケーションです。ユーザーは自分のレシピを作成、表示、編集、削除することができます。

## 主な機能

- ユーザー認証（登録、ログイン、ログアウト）
- レシピのCRUD機能（作成、読み取り、更新、削除）
- ユーザープロファイル管理

## 必須要件

- PHP 8.2 以上
- Composer
- Node.js と npm

## インストール手順

1.  **リポジトリをクローンします。**
    ```bash
    git clone https://github.com/s-toda-web/cooking_app
    cd cooking_app
    ```

2.  **依存関係をインストールします。**
    ```bash
    composer install
    npm install
    ```

3.  **環境ファイルを設定します。**
    `.env.example` ファイルをコピーして `.env` ファイルを作成します。
    ```bash
    cp .env.example .env
    ```

4.  **アプリケーションキーを生成します。**
    ```bash
    php artisan key:generate
    ```

5.  **データベースをセットアップします。**
    `.env`ファイルを開き、データベース接続設定をPostgreSQL用に以下のように変更します。

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

    **注意:** 上記の`your_database_name`, `your_database_user`, `your_database_password`は、ご自身のPostgreSQL環境に合わせて適切な値に置き換えてください。また、指定したデータベースがPostgreSQLサーバー上に存在することを確認してください。

6.  **データベースマイグレーションを実行します。**
    ```bash
    php artisan migrate
    ```

7.  **フロントエンドアセットをビルドします。**
    ```bash
    npm run build
    ```

## アプリケーションの実行

開発サーバーを起動するには、次のコマンドを実行します。

```bash
php artisan serve
```

別のターミナルで、Vite開発サーバーを起動します。

```bash
npm run dev
```

または、`composer.json`に定義されている`dev`スクリプトを使用して、必要なすべての開発サーバーを一度に起動することもできます。

```bash
composer run dev
```

アプリケーションには `http://localhost:8000` からアクセスできます。

## テスト

アプリケーションのテストスイートを実行するには、次のコマンドを使用します。

```bash
php artisan test
```
