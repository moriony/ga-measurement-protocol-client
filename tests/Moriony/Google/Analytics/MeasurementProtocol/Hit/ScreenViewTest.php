<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class ScreenViewTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var ScreenView */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('screenview'))
            ->getMock();

        $this->hit = new ScreenView($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('screenview', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('screenview')
            ->with(array(
                't' => 'screenview',
                'an' => 'some_app_name',
                'av' => 'some_app_version',
                'aid' => 'some_app_id',
                'aiid' => 'some_app_installer_id',
                'cd' => 'some_content_description',
            ));

        $this->hit
            ->setAppName('some_app_name')
            ->setAppVersion('some_app_version')
            ->setAppId('some_app_id')
            ->setAppInstallerId('some_app_installer_id')
            ->setContentDescription('some_content_description')
            ->track();
    }

    public function testAppName()
    {
        $this->hit->setAppName('some_app_name');
        $this->assertSame('some_app_name', $this->hit->getAppName());
    }

    public function testAppVersion()
    {
        $this->hit->setAppVersion('some_app_version');
        $this->assertSame('some_app_version', $this->hit->getAppVersion());
    }

    public function testAppId()
    {
        $this->hit->setAppId('some_app_id');
        $this->assertSame('some_app_id', $this->hit->getAppId());
    }

    public function testAppInstallerId()
    {
        $this->hit->setAppInstallerId('some_app_installer_id');
        $this->assertSame('some_app_installer_id', $this->hit->getAppInstallerId());
    }

    public function testContentDescription()
    {
        $this->hit->setContentDescription('some_content_description');
        $this->assertSame('some_content_description', $this->hit->getContentDescription());
    }
}