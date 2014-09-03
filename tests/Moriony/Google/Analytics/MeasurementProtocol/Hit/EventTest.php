<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class EventTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Event */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('event'))
            ->getMock();

        $this->hit = new Event($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('event', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('event')
            ->with(array(
                't' => 'event',
                'ec' => 'test_category',
                'ev' => 'test_value',
                'ea' => 'test_action',
                'el' => 'test_label',
                'cid' => 'test_customer_id',
                'tid' => 'test_tracking_id',
                'ua' => 'test_user_agent',
                'uip' => 'test_user_id',
                'v' => 'test_version'
            ));

        $this->hit->setCategory('test_category')
            ->setValue('test_value')
            ->setAction('test_action')
            ->setLabel('test_label')
            ->setCustomerId('test_customer_id')
            ->setTrackingId('test_tracking_id')
            ->setUserAgent('test_user_agent')
            ->setUserIp('test_user_id')
            ->setVersion('test_version')
            ->track();
    }

    public function testCategory()
    {
        $this->hit->setCategory('some_category');
        $this->assertSame('some_category', $this->hit->getCategory());
    }

    public function testValue()
    {
        $this->hit->setValue('some_value');
        $this->assertSame('some_value', $this->hit->getValue());
    }

    public function testAction()
    {
        $this->hit->setAction('some_action');
        $this->assertSame('some_action', $this->hit->getAction());
    }
}