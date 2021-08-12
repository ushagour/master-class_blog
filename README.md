
master-class is a web bloge crated by me using laravel frameworek 7 .
   ===> Back-office
views admin + auth +






# Git

### clone l project men github

```
git clone url of rep
```
# composer

### install package 

```
Run composer install
```


# laravel
```
 php artisan key:generate.
```



# Database

### Kifach ndir bach n3amar db btables ?
```
php artisan migrate
```

### Kifach ndir ila tra liya error f migration ?
```
php artisan migrate:fresh
```

### Kifach ndir bach ndekhel users dyal test ?
```
php artisan db:seed --class=UsersSeeder
```

# Migrations
### drop constrainte colums

```php
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign("categories_type_id_foreign");
            $table->dropColumn("type_id");
        });
    }
```

