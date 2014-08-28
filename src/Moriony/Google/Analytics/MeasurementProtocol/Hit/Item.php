<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Item extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_ITEM);
    }

    public function setTransactionId($id)
    {
        return $this->setData(self::FIELD_TRANSACTION_ID, $id);
    }

    public function getTransactionId()
    {
        return $this->getData(self::FIELD_TRANSACTION_ID);
    }

    public function setItemName($name)
    {
        return $this->setData(self::FIELD_ITEM_NAME, $name);
    }

    public function getItemName()
    {
        return $this->getData(self::FIELD_ITEM_NAME);
    }

    public function setItemPrice($price)
    {
        return $this->setData(self::FIELD_ITEM_PRICE, $price);
    }

    public function getItemPrice()
    {
        return $this->getData(self::FIELD_ITEM_PRICE);
    }

    public function setItemQuantity($quantity)
    {
        return $this->setData(self::FIELD_ITEM_QUANTITY, $quantity);
    }

    public function getItemQuantity()
    {
        return $this->getData(self::FIELD_ITEM_QUANTITY);
    }

    public function setItemCode($code)
    {
        return $this->setData(self::FIELD_ITEM_CODE, $code);
    }

    public function getItemCode()
    {
        return $this->getData(self::FIELD_ITEM_CODE);
    }

    public function setItemVariation($variation)
    {
        return $this->setData(self::FIELD_ITEM_VARIATION, $variation);
    }

    public function getItemVariation()
    {
        return $this->getData(self::FIELD_ITEM_VARIATION);
    }

    public function setCurrency($currency)
    {
        return $this->setData(self::FIELD_CURRENCY, $currency);
    }

    public function getCurrency()
    {
        return $this->getData(self::FIELD_CURRENCY);
    }
}