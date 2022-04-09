# KCB Buni API PHP SDK

## Installation

```cmd
composer require osenco/kcb
```

## Instantiation

```php
$kcb = new Osen\Kcb\Bank(array(
    'token' => ''
));
```

## USage

### Check forex rate

```php
$rate = $kcb->forex()->check('USD', 'EUR', 100);
```
