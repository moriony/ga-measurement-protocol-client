<?php

require_once __DIR__ .'/../vendor/autoload.php';

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
