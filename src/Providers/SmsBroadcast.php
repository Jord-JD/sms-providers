<?php

namespace JordJD\SmsProviders\Providers;

use JordJD\SmsProviders\Interfaces\ProviderInterface;

class SmsBroadcast extends BaseProvider implements ProviderInterface
{
    protected $destinationCountryNames = [
        'Australia',
        'New Zealand',
    ];

}