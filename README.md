## Laravel Passport Authentication (Oauth)

## Clone this repo
```
https://github.com/samironbarai/laravel-passport-auth.git
```

## Install composer packages
```
$ cd laravel-passport-auth
$ composer install
```

## Create and setup .env file
```
make a copy of .env.example and rename to .env
$ copy .env.example .env
$ php artisan key:generate
put database credentials in .env file
```

## Migrate and insert records
```
$ php artisan migrate
$ php artisan tinker
$ factory(App\User::class, 10)->create();
$ factory(App\Post::class, 100)->create();
$ exit
```

## Generate secure access tokens
```
$ php artisan passport:install
put passport client login endpoint, id and secret in .env file
PASSPORT_LOGIN_ENDPOINT=""
PASSPORT_CLIENT_ID=
PASSPORT_CLIENT_SECRET=""
```

## Test with insomnia or postman

## Facing any problem? Contact with me

Click on the image bellow to see YouTube video.

[![Laravel 7 Blog CMS](https://img.youtube.com/vi/SFVb-h3fkNo/0.jpg)](https://www.youtube.com/watch?v=SFVb-h3fkNo) 

Please visit my website.
[samironbarai.com](https://samironbarai.com) 
