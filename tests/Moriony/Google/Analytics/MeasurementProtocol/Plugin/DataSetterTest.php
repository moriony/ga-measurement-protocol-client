<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Plugin;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Common\Event;

class DataSetterTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient $client */
    protected $client;

    public function setUp()
    {
        $this->client =  MeasurementProtocolClient::factory();
    }

    public function testSuccessfulSet()
    {
        $plugin = new DataSetter(array(
            'test_key' => 'test_value'
        ));
        $command = new OperationCommand();
        $event = new Event(array('command' => $command));

        $plugin->register($this->client);
        $this->client->getEventDispatcher()->dispatch('command.before_prepare', $event);

        $this->assertSame('test_value', $command->get('test_key'));
    }

    public function testAlreadyStated()
    {
        $plugin = new DataSetter(array(
            'test_key' => 'test_value'
        ));
        $command = new OperationCommand();
        $command->set('test_key', 'already_stated_value');
        $event = new Event(array('command' => $command));

        $plugin->register($this->client);
        $this->client->getEventDispatcher()->dispatch('command.before_prepare', $event);

        $this->assertSame('already_stated_value', $command->get('test_key'));
    }

    public function testForceSet()
    {
        $plugin = new DataSetter(array(
            'test_key' => 'test_value'
        ), true);
        $command = new OperationCommand();
        $command->set('test_key', 'already_stated_value');
        $event = new Event(array('command' => $command));

        $plugin->register($this->client);
        $this->client->getEventDispatcher()->dispatch('command.before_prepare', $event);

        $this->assertSame('test_value', $command->get('test_key'));
    }
}