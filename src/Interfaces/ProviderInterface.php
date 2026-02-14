<?php

namespace JordJD\SmsProviders\Interfaces;

interface ProviderInterface
{
    public function getSupportedDestinations() : array;
}