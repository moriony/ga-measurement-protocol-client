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
                'pdt' => 'some_page_download_time',
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
            ->setPageDownloadTime('some_page_download_time')
            ->setRedirectTime('some_redirect_time')
            ->setTcpConnectTime('some_tcp_connect_time')
            ->setServerResponseTime('some_server_response_time')
            ->track();
    }

    public function testCategory()
    {
        $this->hit->setCategory('some_category');
        $this->assertSame('some_category', $this->hit->getCategory());
    }

    public function testVariable()
    {
        $this->hit->setVariable('some_variable');
        $this->assertSame('some_variable', $this->hit->getVariable());
    }

    public function testTime()
    {
        $this->hit->setTime('some_time');
        $this->assertSame('some_time', $this->hit->getTime());
    }

    public function testLabel()
    {
        $this->hit->setLabel('some_label');
        $this->assertSame('some_label', $this->hit->getLabel());
    }

    public function testDnsLoadTime()
    {
        $this->hit->setDnsLoadTime('some_dns_load_time');
        $this->assertSame('some_dns_load_time', $this->hit->getDnsLoadTime());
    }

    public function testPageDownloadTime()
    {
        $this->hit->setPageDownloadTime('some_page_download_time');
        $this->assertSame('some_page_download_time', $this->hit->getPageDownloadTime());
    }

    public function testRedirectTime()
    {
        $this->hit->setRedirectTime('some_redirect_time');
        $this->assertSame('some_redirect_time', $this->hit->getRedirectTime());
    }

    public function testTcpConnectTime()
    {
        $this->hit->setTcpConnectTime('some_tcp_connect_time');
        $this->assertSame('some_tcp_connect_time', $this->hit->getTcpConnectTime());
    }

    public function testServerResponseTime()
    {
        $this->hit->setServerResponseTime('some_server_response_time');
        $this->assertSame('some_server_response_time', $this->hit->getServerResponseTime());
    }
}