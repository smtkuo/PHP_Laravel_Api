# PHP Laravel Api

### Run application

```
docker-compose up -d
cd ./www
copy .env.example .env
composer install
php artisan key:generate
php artisan migrate
```

### DB Config

```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=pass
```

# Entity Relationship Model.

![alt text](https://raw.githubusercontent.com/smtkuo/PHP_Laravel_Api/main/entity-relationship-model.png?token=GHSAT0AAAAAABPL6XTQTVIT5RGR4AS62454YQSZAZQ)
[View More](https://htmlpreview.github.io/?https://github.com/smtkuo/PHP_Laravel_Api/blob/main/www/docs/erd/index.html)

# Api Documentation.

![alt text](https://raw.githubusercontent.com/smtkuo/PHP_Laravel_Api/main/api-documentation.png?token=GHSAT0AAAAAABPL6XTR5UM45BU6HTHSBE7MYQSZCDA)
[View More](https://htmlpreview.github.io/?https://github.com/smtkuo/PHP_Laravel_Api/blob/main/www/docs/request-docs/index.html)
