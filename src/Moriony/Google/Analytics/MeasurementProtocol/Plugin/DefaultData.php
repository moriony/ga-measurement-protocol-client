<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class DefaultData implements PluginInterface
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param MeasurementProtocolClient $client
     */
    public function register($client)
    {
        $data = & $this->data;
        $client->getEventDispatcher()->addListener('command.before_prepare', function ($e) use($data) {
            /** @var \Guzzle\Service\Command\OperationCommand $command */
            $command = $e['command'];
            foreach ($data as $key => $val) {
                if (!$command->hasKey($key)) {
                    $command->set($key, $val);
                }
            }
        });
    }
}