<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class EventTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient */
    protected $client;

    /** @var Event */
    protected $hit;

    public function setUp()
    {
        $this->client = MeasurementProtocolClient::factory();
        $this->hit = new Event($this->client);
    }

    public function testHitType()
    {
        $this->assertSame('event', $this->hit->getHitType());
    }
}