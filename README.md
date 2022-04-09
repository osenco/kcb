# KCB Buni API PHP SDK

## Table of contents

-[Installation](#installation)
-[Instantiation](#instantiation)
    -[Usage](#usage)
       -[Check Forex rate](#check-forex-rate)

## Installation

```cmd
composer require osenco/kcb
```

## Instantiation

```php
$kcb = new Osen\Kcb\Buni(array(
    'token' => ''
));
```

## Usage

### Check forex rate

```php
$rate = $kcb->forex()->check('USD', 'EUR', 100);

// parse response
$json = $rate->json()
$object = $rate->object()
```
