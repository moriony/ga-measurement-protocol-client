<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\HitInterface;

class UserIpOverrider implements PluginInterface
{
    /**
     * @param MeasurementProtocolClient $client
     */
    public function register($client)
    {
        $client->getEventDispatcher()->addListener('command.before_prepare', function ($e) {
            /** @var \Guzzle\Service\Command\OperationCommand $command */
            $command = $e['command'];
            if (!isset($_SERVER['REMOTE_ADDR'])) {
                return;
            }
            if ($command->hasKey(HitInterface::FIELD_USER_IP)) {
                return;
            }
            $command->set(HitInterface::FIELD_USER_IP, $_SERVER['REMOTE_ADDR']);
        });
    }
}
