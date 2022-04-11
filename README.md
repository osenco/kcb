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
$rate = $buni->forex()->rates('USD');
// or $rate = $buni->forex()->from('EUR')->to('USD')->exchange(100);

// parse response
$json = $rate->json();
$object = $rate->object();
```

### Check account information

```php
$account = $buni->account()->info();
$json = $account->json();
$object = $account->object();
```

### Vooma

#### Make payment

```php
$pay = $buni->vooma()->pay(100);
$json = $pay->json();
$object = $pay->object();
```
