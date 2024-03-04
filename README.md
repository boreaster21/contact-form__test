# お問い合わせフォーム

## 環境構築

#### Dockerビルド
1. git clone リンク
2. docker-compose up -d -build
＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ファイルを編集してください。

### Lravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan migrate
5. php arttisan migrate
6. php artisan db:seed

## 使用技術

- PHP 8.0
- Laravel 10.0
- MySQL 8.0

## ER図
![contact-form drawio (1)](https://github.com/boreaster21/test-contact-form/assets/155618258/08ebedd6-4615-4997-b9fa-025fda077dcc)



## URL

- 開発環境：http://localhost/
- phpMyadmin：http://localhost:8080/
