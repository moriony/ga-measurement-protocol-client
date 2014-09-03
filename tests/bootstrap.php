<?php

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Service\Builder\ServiceBuilder;

if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

require dirname(__DIR__) . '/vendor/autoload.php';

GuzzleTestCase::setMockBasePath(__DIR__ . '/mock');
GuzzleTestCase::setServiceBuilder(ServiceBuilder::factory(array(
    'ga_measurement_protocol' => array(
        'class' => 'Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient',
        'params' => array()
    )
)));
