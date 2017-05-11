# PHPMailForm

PHP で確認画面付きのコンタクトフォームを実装する例

## インストール

```
git clone https://github.com/tsubo/PHPMailForm.git
cd PHPMailForm
composer install
```

## 初期設定

.env ファイルの作成

```
cp .env.example .env
```

.env ファイルの編集

Gmail の SMTP サーバーを使う場合の設定例

```
# SMTP 設定
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_password

# メール設定
MAIL_FROM_ADDRESS=your_email@gmail.com  # From アドレス
MAIL_FROM_NAME="Your Name"              # 送信者名
MAIL_CONTACT_TO=to_email@domain.com     # お問い合わせの宛先アドレス
```

## 動作確認

```
php -S localhost:8000
```