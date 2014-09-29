<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class DataSetter implements PluginInterface
{
    protected $data;

    public function __construct(array $data, $force = false)
    {
        $this->data = $data;
        $this->force = $force;
    }

    /**
     * @param MeasurementProtocolClient $client
     */
    public function register($client)
    {
        $data = & $this->data;
        $force = & $this->force;
        $client->getEventDispatcher()->addListener('command.before_prepare', function ($e) use($data, $force) {
            /** @var \Guzzle\Service\Command\OperationCommand $command */
            $command = $e['command'];
            foreach ($data as $key => $val) {
                if (!$command->hasKey($key) || $force) {
                    $command->set($key, $val);
                }
            }
        });
    }
}
