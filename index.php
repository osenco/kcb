<?php
// Examples
use Osen\Kcb\Buni;

require_once __DIR__ . '/vendor/autoload.php';

$buni = new Buni(array(
    'token' => '',
    'env'   => 'sandbox',
));

// Check forex rate
$rate = $buni->forex()->rates(100, 'EUR', 'USD');
// or $rate = $buni->forex()->from('EUR')->to('USD')->exchange(100);

// parse response
$json   = $rate->json();
$object = $rate->object();

exit($rate);
