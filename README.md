# KCB Buni API PHP SDK

## Table of contents

* [Installation](#installation)
* [Instantiation](#instantiation)
  * [Usage](#usage)
    * [Check Forex rate](#check-forex-rate)
  * [Contributing](#contributing)
* [License](#license)

## Installation

```cmd
composer require osenco/kcb
```

## Instantiation

```php
use Osen\Kcb\Buni;

$buni = new Buni(array(
    'token' => '',
    'env'   => 'sandbox',
));
```

## Usage

### Check forex rate

```php
$rate = $buni->forex()->exchange(100, 'EUR', 'USD');

// OR
$rate = $buni->forex()->from('EUR')->to('USD')->exchange(100);

// parse response
$json = $rate->json();
$object = $rate->object();
```
