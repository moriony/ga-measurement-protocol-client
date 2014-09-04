<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class TransactionTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Transaction */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('transaction'))
            ->getMock();

        $this->hit = new Transaction($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('transaction', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('transaction')
            ->with(array(
                't' => 'transaction',
                'ti' => 'some_id',
                'ta' => 'some_affiliation',
                'tr' => 'some_revenue',
                'ts' => 'some_shipping',
                'tt' => 'some_tax',
                'cu' => 'some_currency',
            ));

        $this->hit
            ->setId('some_id')
            ->setAffiliation('some_affiliation')
            ->setRevenue('some_revenue')
            ->setShipping('some_shipping')
            ->setTax('some_tax')
            ->setCurrency('some_currency')
            ->track();
    }

    public function testId()
    {
        $this->hit->setId('some_id');
        $this->assertSame('some_id', $this->hit->getId());
    }

    public function testAffiliation()
    {
        $this->hit->setAffiliation('some_affiliation');
        $this->assertSame('some_affiliation', $this->hit->getAffiliation());
    }

    public function testRevenue()
    {
        $this->hit->setRevenue('some_revenue');
        $this->assertSame('some_revenue', $this->hit->getRevenue());
    }

    public function testShipping()
    {
        $this->hit->setShipping('some_shipping');
        $this->assertSame('some_shipping', $this->hit->getShipping());
    }

    public function testTax()
    {
        $this->hit->setTax('some_tax');
        $this->assertSame('some_tax', $this->hit->getTax());
    }

    public function testCurrency()
    {
        $this->hit->setCurrency('some_currency');
        $this->assertSame('some_currency', $this->hit->getCurrency());
    }
}