<?php

namespace Moriony\Google\Analytics\MeasurementProtocol;

use Guzzle\Tests\GuzzleTestCase;

class ClientTest extends GuzzleTestCase
{
    /** @var Client */
    protected $client;

    public function setUp()
    {
        $this->client = new Client([
            'tracking_id' => getenv('tracking_id'),
        ]);
    }

    public function testCreateEvent()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\Event', $this->client->createEvent());
    }

    public function testCreatePageView()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\PageView', $this->client->createPageView());
    }

    public function testCreateTransaction()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\Transaction', $this->client->createTransaction());
    }

    public function testCreateItem()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\Item', $this->client->createItem());
    }

    public function testCreateSocial()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\Social', $this->client->createSocial());
    }

    public function testCreateException()
    {
        $this->assertInstanceOf('Moriony\Google\Analytics\MeasurementProtocol\Hit\Exception', $this->client->createException());
    }

    public function testRegisterPlugin()
    {
        $mock = $this->createPluginMock();
        $mock->expects($this->once())
             ->method('register');

        $this->client->registerPlugin($mock);
    }

    public function testRegisterPluginsArray()
    {
        $this->client->registerPlugins(array(
            $this->createPluginMock(),
            $this->createPluginMock()
        ));
    }

    protected function createPluginMock()
    {
        $mock = $this->getMockBuilder('Moriony\Google\Analytics\MeasurementProtocol\Plugin\PluginInterface')
            ->disableOriginalConstructor()
            ->setMethods(['register'])
            ->getMock();

        $mock->expects($this->once())
             ->method('register');

        return $mock;
    }
}