# douyin-open-sdk
let php developer easier to access douyin open api

Install the latest version with

```bash
$ composer require ydg/douyin-open-sdk
```

## Basic Usage

### Get Client Token

```php
<?php

namespace Ydg\DouyinOpenSdk\Douyin;

$app = new Douyin();
$app->oauth->client_token([
    'client_key' => 'your client key',
    'client_secret' => 'your client secret',
]);
```

### Search Product

```php
<?php

namespace Ydg\DouyinOpenSdk\Douyin;

$app = new Douyin([
    'access_token' => 'your access_token'
]);
$app->lifeOutsideDistribution->search_product([
    'uid' => 'your uid',
    'cursor' => 0,
    'count' => 10,
    'sort_by' => 1,
    'order_by' => 1,
]);
```
