<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Guzzle\Tests\GuzzleTestCase;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class ItemTest extends GuzzleTestCase
{
    /** @var MeasurementProtocolClient|\PHPUnit_Framework_MockObject_MockObject */
    protected $clientMock;

    /** @var Item */
    protected $hit;

    public function setUp()
    {
        $this->clientMock = $this->getMockBuilder('Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient')
            ->disableOriginalConstructor()
            ->setMethods(array('item'))
            ->getMock();

        $this->hit = new Item($this->clientMock);
    }

    public function testHitType()
    {
        $this->assertSame('item', $this->hit->getHitType());
    }

    public function testTrack()
    {
        $this->clientMock->expects($this->once())
            ->method('item')
            ->with(array(
                't' => 'item',
                'ti' => 'some_transaction_id',
                'cu' => 'some_currency',
                'ic' => 'some_item_code',
                'in' => 'some_item_name',
                'ip' => 'some_item_price',
                'iq' => 1,
                'iv' => 'some_item_variation',
            ));

        $this->hit
            ->setTransactionId('some_transaction_id')
            ->setCurrency('some_currency')
            ->setItemCode('some_item_code')
            ->setItemName('some_item_name')
            ->setItemPrice('some_item_price')
            ->setItemQuantity('1')
            ->setItemVariation('some_item_variation')
            ->track();
    }

    public function testTransactionId()
    {
        $this->hit->setTransactionId('some_transaction_id');
        $this->assertSame('some_transaction_id', $this->hit->getTransactionId());
    }

    public function testCurrency()
    {
        $this->hit->setCurrency('some_currency');
        $this->assertSame('some_currency', $this->hit->getCurrency());
    }

    public function testItemVariation()
    {
        $this->hit->setItemVariation('some_item_variation');
        $this->assertSame('some_item_variation', $this->hit->getItemVariation());
    }

    public function testItemQuantity()
    {
        $this->hit->setItemQuantity(1);
        $this->assertSame(1, $this->hit->getItemQuantity());
    }

    public function testItemPrice()
    {
        $this->hit->setItemPrice('some_item_price');
        $this->assertSame('some_item_price', $this->hit->getItemPrice());
    }

    public function testItemName()
    {
        $this->hit->setItemName('some_item_name');
        $this->assertSame('some_item_name', $this->hit->getItemName());
    }

    public function testItemCode()
    {
        $this->hit->setItemCode('some_item_code');
        $this->assertSame('some_item_code', $this->hit->getItemCode());
    }
}