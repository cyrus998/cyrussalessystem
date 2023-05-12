composer update

cp .env.example .env

edit database name= laravel

MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=cyrusfranciscopro@gmail.com
MAIL_PASSWORD=vozkpotleqhljlqe
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=cyrusfranciscopro@gmail.com
MAIL_FROM_NAME="CyrusDevApps"



create a db in phpmysql named: laravel

npm install

npm run dev

php artisan migrate:fresh

php artiasn db:seed

php artisan storage:link

php artisan serve
