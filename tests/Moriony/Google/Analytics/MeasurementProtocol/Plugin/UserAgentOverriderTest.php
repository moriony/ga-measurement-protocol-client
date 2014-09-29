<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Event;

class UserAgentOverriderTest extends GuzzleTestCase
{
    public function setUp()
    {
        $_SERVER['HTTP_USER_AGENT'] = null;
    }

    public function testSuccessfulUserAgentOverride()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14';
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame('Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14', $command->get('ua'));
    }

    public function testEmptyUserAgentOverride()
    {
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame(null, $command->get('ua'));
    }

    public function testAlreadyOverriddenUserAgent()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14';
        $command = new OperationCommand();
        $command->set('ua', 'some_value');
        $this->dispatchCommand($command);
        $this->assertSame('some_value', $command->get('ua'));
    }

    protected function dispatchCommand(OperationCommand $command)
    {
        $client = MeasurementProtocolClient::factory();
        $plugin = new UserAgentOverrider();
        $event = new Event(array('command' => $command));
        $plugin->register($client);
        $client->getEventDispatcher()->dispatch('command.before_prepare', $event);
    }

    public function tearDown()
    {
        $_SERVER['HTTP_USER_AGENT'] = null;
    }
}