<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

interface PluginInterface
{
    /** @param MeasurementProtocolClient $client  */
    public function register($client);
}
