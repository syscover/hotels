# Hotels to Laravel 5.2

[![Total Downloads](https://poser.pugx.org/syscover/hotels/downloads)](https://packagist.org/packages/syscover/hotels)

## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value**
```
"syscover/hotels": "~1.0"
```
and execute on console:
```
composer install
```

**2 - Register service provider, on file config/app.php add to providers array**
```
Syscover\Hotels\HotelsServiceProvider::class,
```

**3 - Execute publish command**
```
php artisan vendor:publish
```

**4 - Execute optimize command load new classes**
```
php artisan optimize
```

**5 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="HotelsTableSeeder"
```

**6 - Execute command to load all updates**
```
php artisan migrate --path=database/migrations/updates
```


## Activate Package
Access to Pulsar Panel, and go to:
 
Administration-> Permissions-> Profiles, and set all permissions to your profile by clicking on the open lock.<br>

Go to Administration -> Packages, edit the package installed and activate it.