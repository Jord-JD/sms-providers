# SMS Providers

> [!WARNING]
> This package is retired. Its provider coverage tables are static and can become inaccurate as carrier routes, regulatory rules, and provider availability change.
>
> New applications should query the chosen SMS provider's current coverage/pricing API or documentation at decision time. Existing v3 releases remain available only for legacy applications that have independently validated the bundled data.

This library provides data on popular SMS providers.

## Installation

To install the SMS Providers package, simply run the 
following Composer command from the root of your
project.

```bash
composer require jord-jd/sms-providers
```

## Usage

### Get providers by destination country

You can retrieve all the providers that deliver SMS
to specific countries. See the following code for an
example.

```php
$country = (new Countries())->getByName('United Kingdom');
$providers = (new Providers())->getByDestinationCountry($country);
```

This code will retrieve an array of all the providers
that support sending text messages to phone numbers
starting with the '44' calling code (United Kingdom).

### Get providers by calling code

You can retrieve all the providers that deliver SMS
to numbers beginning with a specific calling code. See
the following example snippet.

```php
$providers = (new Providers())->getByDestinationCallingCode('44');
```

This code will retrieve an array of all the providers
that support sending text messages to phone numbers
starting with the '44' calling code (United Kingdom).
