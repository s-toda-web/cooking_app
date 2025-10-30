# Cooking App

このアプリケーションは、Laravelフレームワークを使用して構築されたシンプルな料理レシピ管理アプリケーションです。ユーザーは自分のレシピを作成、表示、編集、削除することができます。

## 主な機能

- ユーザー認証（登録、ログイン、ログアウト）→ユーザー認証は学習用に実装した練習部分のため、今回は確認不要です。
- レシピのCRUD機能（作成、読み取り、更新、削除）

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
    npm install # Viteを含むフロントエンドの依存関係をインストール
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

このプロジェクトでは、`composer run dev`コマンド一つで、開発に必要なサーバー（PHPの組み込みサーバーとViteの開発サーバー）を同時に起動できます。

```bash
composer run dev
```

これにより、バックエンドとフロントエンドの変更がリアルタイムで反映される開発環境が整います。

アプリケーションには `http://localhost:8000` からアクセスできます。

もし個別にサーバーを起動したい場合は、それぞれ別のターミナルで以下のコマンドを実行してください。

```bash
# ターミナル1: PHPサーバーを起動
php artisan serve

# ターミナル2: Vite開発サーバーを起動
npm run dev
```

## テスト

アプリケーションのテストスイートを実行するには、次のコマンドを使用します。

```bash
php artisan test
```

## イメージ写真

### ホーム画面
シンプルで見やすいUIに設計しました。
![ホーム画面の写真](./スクリーンショット%202025-10-30%2014.11.55.png)

### レシピ投稿画面
色は「ニンジン」をイメージしました。
![レシピ投稿画面の写真](./スクリーンショット%202025-10-30%2014.12.16.png)

### 編集画面
色は「なすび」をイメージしました。
![編集画面の写真](./スクリーンショット%202025-10-30%2014.12.38.png)