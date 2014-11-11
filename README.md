[![Build Status](https://travis-ci.org/m4oc/php-ecs.svg)](https://travis-ci.org/m4oc/php-ecs)

Seeweb Unofficial PHP SDK for Easycloud (v.0.2)

Product information: [http://www.seeweb.it/easycloudserver](http://www.seeweb.it/easycloudserver)

Api official documentation: [http://www.wikicloud.it/EasyCloud] (http://www.wikicloud.it/EasyCloud)

Usage
-----

USERNAME = Your account username

PASSWORD = Your account password

TEMPLATENAME = Name of bootable image, get by getinfo()

SIZE = Avariable size see [DOC](http://www.wikicloud.it/EasyCloud)

LOCATION = Avariable location see [DOC](http://www.wikicloud.it/EasyCloud)

ECSNAME = Server name

Include library and basic usage

```php
namespace Ecs;
require 'vendor/autoload.php';

$ecs = new Ecs ('USERNAME','PASSWORD',' https://ecs.cloudcenter.seeweb.it/api/public/easycloud/');

```

Get account information

```php
$response = $ecs->getinfo();
print_r($response);
```

Create new Ecs

```php
$response = $ecs->create('TEMPLATENAME','SIZE','LOCATION');
print_r($response);
```

Delete Ecs

```php
$response = $ecs->delete('ECSNAME');
print_r($response)
```

Make snapshoot

```php
$response = $ecs->action('ECSNAME','snapshot','Comment comment');
print_r($response);
```
