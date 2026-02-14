<?php

namespace JordJD\SmsProviders;

use JordJD\Countries\Country;
use JordJD\SmsProviders\Interfaces\ProviderInterface;
use JordJD\SmsProviders\Providers\AmazonSNS;
use JordJD\SmsProviders\Providers\SmsBroadcast;
use JordJD\SmsProviders\Providers\Textlocal;
use JordJD\SmsProviders\Providers\Twilio;

class Providers
{
    const PROVIDERS_CLASS_NAMES = [
        AmazonSNS::class,
        SmsBroadcast::class,
        Textlocal::class,
        Twilio::class,
    ];

    public function all()
    {
        $providers = [];

        foreach (self::PROVIDERS_CLASS_NAMES as $className) {
            $providers[] = new $className;
        }

        return $providers;
    }

    public function getByDestinationCountry(Country $country)
    {
        $providers = [];

        /** @var ProviderInterface $provider */
        foreach ($this->all() as $provider) {
            /** @var Country $supportedDestinationCountry */
            foreach ($provider->getSupportedDestinations() as $supportedDestinationCountry) {
                if ($supportedDestinationCountry->isoCodeAlpha3 === $country->isoCodeAlpha3) {
                    $providers[] = $provider;
                    break;
                }
            }
        }

        return $providers;
    }

    public function getByDestinationCallingCode(string $callingCode) : array
    {
        $providers = [];

        /** @var ProviderInterface $provider */
        foreach ($this->all() as $provider) {
            foreach ($provider->getSupportedDestinations() as $country) {
                if (in_array($callingCode, $country->callingCodes)) {
                    $providers[] = $provider;
                    break;
                }
            }
        }

        return $providers;
    }
}