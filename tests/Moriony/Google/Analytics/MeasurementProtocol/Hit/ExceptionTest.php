<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class ExceptionTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Exception */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('exception'))
            ->getMock();

        $this->hit = new Exception($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('exception', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('exception')
            ->with(array(
                't' => 'exception',
                'exd' => 'test_exception_description',
                'exf' => true
            ));

        $this->hit->setExceptionDescription('test_exception_description')
            ->setExceptionIsFatal(true)
            ->track();
    }

    public function testExceptionIsFatal()
    {
        $this->hit->setExceptionIsFatal(false);
        $this->assertFalse($this->hit->getExceptionIsFatal());
    }

    public function testExceptionDescription()
    {
        $this->hit->setExceptionDescription('description');
        $this->assertSame('description', $this->hit->getExceptionDescription());
    }
}