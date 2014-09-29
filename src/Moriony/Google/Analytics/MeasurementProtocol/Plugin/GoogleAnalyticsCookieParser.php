<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\HitInterface;
use Wb\GoogleAnalyticsCookieParser\GoogleAnalyticsCookieParser as Parser;

class GoogleAnalyticsCookieParser implements PluginInterface
{
    const DEFAULT_COOKIE_NAME = '_ga';

    protected $cookieName;

    public function __construct($cookieName = self::DEFAULT_COOKIE_NAME)
    {
        $this->cookieName = $cookieName;
    }

    /**
     * @param MeasurementProtocolClient $client
     */
    public function register($client)
    {
        $cookieName = $this->cookieName;
        $client->getEventDispatcher()->addListener('command.before_prepare', function ($e) use($cookieName) {
            if (!array_key_exists($cookieName, $_COOKIE)) {
                return;
            }
            $parser = new Parser();
            $data = $parser->parse($_COOKIE[$cookieName]);

            /** @var \Guzzle\Service\Command\OperationCommand $command */
            $command = $e['command'];
            if (!$command->hasKey(HitInterface::FIELD_CUSTOMER_ID)) {
                $command->set(HitInterface::FIELD_CUSTOMER_ID, $data->getClientId());
            }
        });
    }
}
