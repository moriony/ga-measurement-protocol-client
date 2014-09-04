<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

/**
 * @codeCoverageIgnore
 */
interface PluginInterface
{
    /** @param MeasurementProtocolClient $client  */
    public function register($client);
}