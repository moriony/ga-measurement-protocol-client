<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\HitInterface;

class UserAgentOverrider implements PluginInterface
{
    /**
     * @param MeasurementProtocolClient $client
     */
    public function register($client)
    {
        $client->getEventDispatcher()->addListener('command.before_prepare', function ($e) {
            /** @var \Guzzle\Service\Command\OperationCommand $command */
            $command = $e['command'];
            if (!isset($_SERVER['HTTP_USER_AGENT'])) {
                return;
            }
            if ($command->hasKey(HitInterface::FIELD_USER_AGENT)) {
                return;
            }
            $command->set(HitInterface::FIELD_USER_AGENT, $_SERVER['HTTP_USER_AGENT']);
        });
    }
}
