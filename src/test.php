<?php

use JordJD\SmsProviders\Providers;

require_once __DIR__.'/../vendor/autoload.php';

$providers = (new Providers())->getByDestinationCallingCode('44');

foreach ($providers as $provider) {
    echo get_class($provider);
    echo PHP_EOL;
}
