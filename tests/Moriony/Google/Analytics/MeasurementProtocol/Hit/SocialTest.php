<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class SocialTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Social */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('social'))
            ->getMock();

        $this->hit = new Social($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('social', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('social')
            ->with(array(
                't' => 'social',
                'sa' => 'some_action',
                'sn' => 'some_network',
                'st' => 'some_target',
            ));

        $this->hit
            ->setAction('some_action')
            ->setNetwork('some_network')
            ->setTarget('some_target')
            ->track();
    }

    public function testAction()
    {
        $this->hit->setAction('some_action');
        $this->assertSame('some_action', $this->hit->getAction());
    }

    public function testNetwork()
    {
        $this->hit->setNetwork('some_network');
        $this->assertSame('some_network', $this->hit->getNetwork());
    }

    public function testTarget()
    {
        $this->hit->setTarget('some_target');
        $this->assertSame('some_target', $this->hit->getTarget());
    }
}