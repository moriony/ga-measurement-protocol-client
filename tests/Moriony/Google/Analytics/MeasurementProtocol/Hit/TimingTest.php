<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class TimingTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Timing */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('timing'))
            ->getMock();

        $this->hit = new Timing($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('timing', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('timing')
            ->with(array(
                't' => 'timing',
                'utc' => 'some_category',
                'utv' => 'some_variable',
                'utt' => 'some_time',
                'utl' => 'some_label',
                'dns' => 'some_dns_load_time',
                'pdt' => 'some_page_load_time',
                'rrt' => 'some_redirect_time',
                'tcp' => 'some_tcp_connect_time',
                'srt' => 'some_server_response_time',
            ));

        $this->hit
            ->setCategory('some_category')
            ->setVariable('some_variable')
            ->setTime('some_time')
            ->setLabel('some_label')
            ->setDnsLoadTime('some_dns_load_time')
            ->setPageLoadTime('some_page_load_time')
            ->setRedirectTime('some_redirect_time')
            ->setTcpConnectTime('some_tcp_connect_time')
            ->setServerResponseTime('some_server_response_time')
            ->track();
    }

    public function testCategory()
    {
        $this->hit->setCategory('some_Category');
        $this->assertSame('some_Category', $this->hit->getCategory());
    }

    public function testVariable()
    {
        $this->hit->setVariable('some_Variable');
        $this->assertSame('some_Variable', $this->hit->getVariable());
    }

    public function testTime()
    {
        $this->hit->setTime('some_Time');
        $this->assertSame('some_Time', $this->hit->getTime());
    }

    public function testLabel()
    {
        $this->hit->setLabel('some_Label');
        $this->assertSame('some_Label', $this->hit->getLabel());
    }

    public function testDnsLoadTime()
    {
        $this->hit->setDnsLoadTime('some_DnsLoadTime');
        $this->assertSame('some_DnsLoadTime', $this->hit->getDnsLoadTime());
    }

    public function testPageLoadTime()
    {
        $this->hit->setPageLoadTime('some_PageLoadTime');
        $this->assertSame('some_PageLoadTime', $this->hit->getPageLoadTime());
    }

    public function testRedirectTime()
    {
        $this->hit->setRedirectTime('some_RedirectTime');
        $this->assertSame('some_RedirectTime', $this->hit->getRedirectTime());
    }

    public function testTcpConnectTime()
    {
        $this->hit->setTcpConnectTime('some_TcpConnectTime');
        $this->assertSame('some_TcpConnectTime', $this->hit->getTcpConnectTime());
    }

    public function testServerResponseTime()
    {
        $this->hit->setServerResponseTime('some_ServerResponseTime');
        $this->assertSame('some_ServerResponseTime', $this->hit->getServerResponseTime());
    }
}