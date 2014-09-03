<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class AbstractHitTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var AbstractHit */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('event'))
            ->getMock();

        $this->hit = $this->getMockBuilder('Moriony\Google\Analytics\MeasurementProtocol\Hit\AbstractHit')
            ->setConstructorArgs(array($this->clientMock))
            ->setMethods(null)
            ->getMock();
    }

    public function testVersion()
    {
        $this->hit->setVersion('some_version');
        $this->assertSame('some_version', $this->hit->getVersion());
    }

    public function testUserIp()
    {
        $this->hit->setUserIp('some_user_ip');
        $this->assertSame('some_user_ip', $this->hit->getUserIp());
    }

    public function testUserAgent()
    {
        $this->hit->setUserAgent('some_user_agent');
        $this->assertSame('some_user_agent', $this->hit->getUserAgent());
    }

    public function testCustomerId()
    {
        $this->hit->setCustomerId('some_customer_id');
        $this->assertSame('some_customer_id', $this->hit->getCustomerId());
    }

    public function testTrackingId()
    {
        $this->hit->setTrackingId('some_tracking_id');
        $this->assertSame('some_tracking_id', $this->hit->getTrackingId());
    }
}