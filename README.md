Yii2 Extended Migration
=======================
Yii2 Extended Migration extension provides additional functionality to migration.

##Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dn23rus/yii2-extended-migration "1.*"
```

or add

```
"dn23rus/yii2-extended-migration": "1.*"
```

to the require section of your `composer.json` file.


##Usage
-----

Once the extension is installed, add this config to your `configs/main.php` :

```php
    'controllerMap' => [
        // ...
        'migrate' => [
            'class'        => yii\console\controllers\MigrateController::class,
            'templateFile' => '@vendor/dmbur/yii2-extended-migration/views/migration.php',
        ],
        // ...
    ],
```
