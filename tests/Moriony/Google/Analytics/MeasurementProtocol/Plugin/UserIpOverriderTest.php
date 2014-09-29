<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Event;

class UserIpOverriderTest extends GuzzleTestCase
{
    public function setUp()
    {
        $_SERVER['REMOTE_ADDR'] = null;
    }

    public function testSuccessfulUserAgentOverride()
    {
        $_SERVER['REMOTE_ADDR'] = '1.2.3.4';
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame('1.2.3.4', $command->get('uip'));
    }

    public function testEmptyUserAgentOverride()
    {
        $command = new OperationCommand();
        $this->dispatchCommand($command);
        $this->assertSame(null, $command->get('uip'));
    }

    public function testAlreadyOverriddenUserAgent()
    {
        $_SERVER['REMOTE_ADDR'] = '1.2.3.4';
        $command = new OperationCommand();
        $command->set('uip', '4.3.2.1');
        $this->dispatchCommand($command);
        $this->assertSame('4.3.2.1', $command->get('uip'));
    }

    protected function dispatchCommand(OperationCommand $command)
    {
        $client = MeasurementProtocolClient::factory();
        $plugin = new UserIpOverrider();
        $event = new Event(array('command' => $command));
        $plugin->register($client);
        $client->getEventDispatcher()->dispatch('command.before_prepare', $event);
    }

    public function tearDown()
    {
        $_SERVER['REMOTE_ADDR'] = null;
    }
}