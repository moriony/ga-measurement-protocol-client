<?php

require_once __DIR__ .'/../vendor/autoload.php';

use \Moriony\Google\Analytics\MeasurementProtocol\Client;

$client = new Client([
    Client::OPT_TRACKING_ID => 'UA-44411487-1',
    Client::OPT_SSL => true,
]);

$response = $client->createPageView()
    ->setCustomerId(555)
    ->setDocumentHostname('example.com')
    ->setDocumentPath('/home')
    ->setTitle('Homepage')
    ->track();
