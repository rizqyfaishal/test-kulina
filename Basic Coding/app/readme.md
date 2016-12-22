# REST API Example

[![N|Solid](http://blog.legacyteam.info/wp-content/uploads/2014/10/laravel-logo-white.png)](https://laravel.com/)

# Environment Variable
```sh
APP_ENV=local
APP_KEY=base64:OcaG1OTK0PdgN4HCxKCxmPJiK4Q6KV7z6ufIqUPpZaM=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_kulina
DB_USERNAME=YOUR_DATABASE_USER
DB_PASSWORD=YOUR_DATABASE_PASSWORD

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=

```

# Instalasi Database
Untuk instalasi database bisa mengggunakan perintah  **php artisan migrate** atau import file **database.sql**.


# Running Server
```sh
php artisan serve
```

# Route url tersedia
```sh
php artisan route:list
```

# NOTE
Untuk parameter user_id harus selalu bernilai 1 karena saya telah buat juga model User dan recordnya berjumlah 1. SQL insert terdapat di file database.sql.

```sh
INSERT INTO users(name, email, password) VALUES('Rizqy Faishal','rizqyfaishal@hotmail.com','$2y$10$ZLSIicJlJ4Qp7NQpRLyFIuzeob/vzxJrMz3h259Q2f4EAruF6Nlie');
```

# EXAMPLE
Retrive user review dengan id 1 (Jika sudah dilakukan insert sebelumnya)

GET

```sh
/api/user_review/1
```

Respond
```sh
{
  "status": "ok",
  "data": {
    "id": 1,
    "order_id": 1,
    "product_id": 1,
    "user_id": 1,
    "review": "hello world",
    "rating": 1,
    "created_at": "2016-12-22 17:50:44",
    "updated_at": "2016-12-22 17:50:44"
  }
}
```

Create new review
POST
```sh
http://localhost:8000/api/user_review
```

Request Body
```sh
order_id:2
product_id:1
user_id:1
review:hello world
rating:2.3
```

Respond
```sh
{
  "status": "ok",
  "data": {
    "order_id": "2",
    "product_id": "1",
    "user_id": "1",
    "review": "hello world",
    "rating": "2.3",
    "updated_at": "2016-12-22 20:06:06",
    "created_at": "2016-12-22 20:06:06",
    "id": 5
  }
}
```






