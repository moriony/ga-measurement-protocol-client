<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Event;

class GoogleAnalyticsCookieParserTest extends GuzzleTestCase
{
    public function setUp()
    {
        $_COOKIE = array();
    }

    public function testSuccessfulCustomerIdSet()
    {
        $_COOKIE['_ga'] = 'GA1.2.230657868.1384941727';
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame('230657868', $command->get('cid'));
    }

    public function testNotExistedCookieParsing()
    {
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame(null, $command->get('cid'));
    }

    protected function dispatchCommand(OperationCommand $command)
    {
        $client = MeasurementProtocolClient::factory();
        $plugin = new GoogleAnalyticsCookieParser();
        $event = new Event(array('command' => $command));
        $plugin->register($client);
        $client->getEventDispatcher()->dispatch('command.before_prepare', $event);
    }
}