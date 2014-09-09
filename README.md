Google Analytics Measurement Protocol PHP Client wrapper
========================================================================================

[![Build Status](https://travis-ci.org/moriony/ga-measurement-protocol-client.svg?branch=master)](https://travis-ci.org/moriony/ga-measurement-protocol-client)
[![Coverage Status](https://coveralls.io/repos/moriony/ga-measurement-protocol-client/badge.png?branch=master)](https://coveralls.io/r/moriony/ga-measurement-protocol-client?branch=master)
[![Latest Stable Version](https://poser.pugx.org/moriony/php-ga-measurement-protocol/v/stable.svg)](https://packagist.org/packages/moriony/php-ga-measurement-protocol) [![Total Downloads](https://poser.pugx.org/moriony/php-ga-measurement-protocol/downloads.svg)](https://packagist.org/packages/moriony/php-ga-measurement-protocol) [![Latest Unstable Version](https://poser.pugx.org/moriony/php-ga-measurement-protocol/v/unstable.svg)](https://packagist.org/packages/moriony/php-ga-measurement-protocol) [![License](https://poser.pugx.org/moriony/php-ga-measurement-protocol/license.svg)](https://packagist.org/packages/moriony/php-ga-measurement-protocol)

Google Analytics Measurement Protocol PHP client wrapper based on [krizon/php-ga-measurement-protocol](https://github.com/krizon/php-ga-measurement-protocol)

See [Google Analytics Measurement Protocol documentation](https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide)

Installation
-------------------------------------------------------------------------------------------
Use [Composer](http://getcomposer.org/doc/00-intro.md) to add this library to your dependencies:
```bash
$ php composer.phar require moriony/php-ga-measurement-protocol:dev-master
```

Usage
----------------------------------------------------------------------------------------

```php
use \Moriony\Google\Analytics\MeasurementProtocol\Client;

$client = new Client([
    Client::OPT_TRACKING_ID => 'UA-XXXXXXXXX-Y',
    Client::OPT_SSL => true,
]);

$response = $client->createEvent()
    ->setCustomerId(555)
    ->setCategory('video')
    ->setAction('play')
    ->setLabel('holiday')
    ->setValue(300)
    ->track();
```

Testing
----------------------------------------------------------------------------------------

Before you can run the tests make sure you installed the dependencies using composer:

`$ composer install`

PHPUnit itself is included in the dependencies so now you can call:

`$ vendor/bin/phpunit`
