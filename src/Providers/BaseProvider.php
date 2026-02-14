<?php


namespace JordJD\SmsProviders\Providers;

use JordJD\Countries\Countries;
use JordJD\SmsProviders\Utils\Providers;
use JordJD\SmsProviders\Interfaces\ProviderInterface;

abstract class BaseProvider implements ProviderInterface
{
    protected $destinationCountryNames = [];

    public function getSupportedDestinations() : array
    {
        $supportedDestinations = [];
        $countries = new Countries();

        foreach ($this->destinationCountryNames as $countryName) {
            $country = $countries->getByName($countryName);
            if ($country) {
                $supportedDestinations[] = $country;
            }
        }

        return $supportedDestinations;
    }
}