# PG PHP TEST
This is a simple laravel test project. First we can create user list by seeder. By passing user id in route query or params we can see user detail with comments. Finally, We can create user comment from laravel artisan command.

## Installation Process
1. Clone the repository 
```angular2html
- git clone https://github.com/Azim1993/PgPHPTest.git
```
2. Then go to project root
```angular2html
- cd PgPHPTest
```
3. Install dependencies 
```angular2html
- composer install
```
4. Config environment in .env
5. Migrate table 
```angular2html
- php artisan migrate
```
6. Store users
```angular2html
- php artisan db:seed
```
7. Check test status
```angular2html
- php artisan test
```

## Routes Documentations
Bellow all routes detail are provided: 

### 1. Preview user detail via url params
**Method** : `GET` <br>
**Is Password Required** : `NO` <br>
**Query** : ```id={userID}``` <br>
**URL** : ```{{base_url}}/users?id={userID}```

### 2. Preview user detail via url params
**Method** : `GET` <br>
**Is Password Required** : `NO` <br>
**Params** : ```userID``` <br>
**URL** : ```{{base_url}}/users/{userID}```

### 3. Create user comment
**Method** : `POST` <br>
**Is Password Required** : `YES` <br>
**Query** : <br>
```angular2html
{
    "id": required,
    "password": required 
    "comments": required
}
- check config/enums.php file to get password
```
**URL** : ```{{base_url}}/user/comments```

## Console Commands
### Create user comment

**Is Password Required** : `NO` <br>
**Arguments** : `USER_ID` `COMMENT` <br>
**command** : `php artisan user:comments {USER_ID} {COMMENT}` <br>
**Example** : ```php artisan user:comments 1 'Hellow world'```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
