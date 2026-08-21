# Laravel Minimart Catalog

Laravelで作成した、ミニマートの商品管理アプリです。

ユーザー認証、商品のCRUD、セクション管理、Eloquentのリレーションなど、Laravelを使ったWebアプリ開発の基本を学ぶために制作しました。

## 主な機能

- ユーザー登録・ログイン・ログアウト
- 未ログインユーザーのアクセス制限
- 商品の一覧表示・新規登録・編集・更新
- 削除確認モーダルを使った商品の削除
- セクションの一覧表示・登録・削除
- 商品登録・編集時のセクション選択
- フォームバリデーション
- CSRF対策

## データベース構成

主に次の3つのテーブルを使用しています。

- `users`：ユーザー情報
- `sections`：商品のカテゴリー
- `products`：商品情報

SectionとProductには一対多のリレーションがあります。

```text
1つのSection
└── 複数のProduct
```

例：

```text
Beverages
├── Pepsi
├── Coffee
└── Juice
```

## CRUD

| 操作 | 内容 |
| --- | --- |
| Create | 商品の登録 |
| Read | 商品の一覧表示 |
| Update | 商品の編集・更新 |
| Delete | 商品の削除 |

## 使用技術

- PHP 8.2以上
- Laravel 12
- Laravel UI
- MySQL
- Blade
- Bootstrap 5
- JavaScript
- Vite
- Font Awesome

## セットアップ

### 1. リポジトリを取得

```bash
git clone https://github.com/yamamoto-666/laravel-minimart.git
cd laravel-minimart
```

### 2. PHPパッケージをインストール

```bash
composer install
```

### 3. 環境設定ファイルを作成

```bash
cp .env.example .env
php artisan key:generate
```

`.env`に使用するデータベースの接続情報を設定してください。

### 4. テーブルを作成

```bash
php artisan migrate
```

### 5. フロントエンドを準備

```bash
npm install
npm run build
```

### 6. アプリを起動

```bash
php artisan serve
```

起動後、ブラウザで `http://127.0.0.1:8000` を開きます。

## 主な画面

- ログイン・ユーザー登録画面
- 商品一覧画面
- 商品登録画面
- 商品編集画面
- 商品削除確認モーダル
- セクション管理画面

## 学んだこと

- LaravelのMVC構造
- Migrationを使ったデータベース設計
- Eloquentによるデータ操作
- `hasMany`と`belongsTo`による一対多リレーション
- RouteとHTTPメソッド（GET、POST、PATCH、DELETE）
- CRUDの実装
- 認証ミドルウェアによるアクセス制限
- バリデーションとCSRF対策
- BladeとBootstrapを使った画面作成
- 外部キー制約によるデータ整合性
- Git・GitHubを使ったバージョン管理

## 今後の改善案

- Feature Testの追加
- 使用中のセクションを削除した際のエラーメッセージ改善
- フラッシュメッセージの表示
- 商品検索・並び替え・ページネーション
- READMEへの画面スクリーンショット追加
