<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Item extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client)
    {
        parent::__construct($client);
        $this->setHitType(self::HIT_TYPE_ITEM);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setTransactionId($id)
    {
        return $this->setData(self::FIELD_TRANSACTION_ID, $id);
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->getData(self::FIELD_TRANSACTION_ID);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setItemName($name)
    {
        return $this->setData(self::FIELD_ITEM_NAME, $name);
    }

    /**
     * @return mixed
     */
    public function getItemName()
    {
        return $this->getData(self::FIELD_ITEM_NAME);
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setItemPrice($price)
    {
        return $this->setData(self::FIELD_ITEM_PRICE, $price);
    }

    /**
     * @return mixed
     */
    public function getItemPrice()
    {
        return $this->getData(self::FIELD_ITEM_PRICE);
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setItemQuantity($quantity)
    {
        return $this->setData(self::FIELD_ITEM_QUANTITY, (int) $quantity);
    }

    /**
     * @return mixed
     */
    public function getItemQuantity()
    {
        return $this->getData(self::FIELD_ITEM_QUANTITY);
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setItemCode($code)
    {
        return $this->setData(self::FIELD_ITEM_CODE, $code);
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->getData(self::FIELD_ITEM_CODE);
    }

    /**
     * @param string $variation
     * @return $this
     */
    public function setItemVariation($variation)
    {
        return $this->setData(self::FIELD_ITEM_VARIATION, $variation);
    }

    /**
     * @return mixed
     */
    public function getItemVariation()
    {
        return $this->getData(self::FIELD_ITEM_VARIATION);
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        return $this->setData(self::FIELD_CURRENCY, $currency);
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->getData(self::FIELD_CURRENCY);
    }
}
