<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class PageViewTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var PageView */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('pageview'))
            ->getMock();

        $this->hit = new PageView($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('pageview', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('pageview')
            ->with(array(
                't' => 'pageview',
                'dh' => 'some_hostname',
                'dp' => 'some_page',
                'dt' => 'some_title',
            ));

        $this->hit
            ->setDocumentHostname('some_hostname')
            ->setPage('some_page')
            ->setTitle('some_title')
            ->track();
    }

    public function testDocumentHostname()
    {
        $this->hit->setDocumentHostname('some_hostname');
        $this->assertSame('some_hostname', $this->hit->getDocumentHostname());
    }

    public function testPage()
    {
        $this->hit->setPage('some_page');
        $this->assertSame('some_page', $this->hit->getPage());
    }

    public function testTitle()
    {
        $this->hit->setTitle('some_title');
        $this->assertSame('some_title', $this->hit->getTitle());
    }
}