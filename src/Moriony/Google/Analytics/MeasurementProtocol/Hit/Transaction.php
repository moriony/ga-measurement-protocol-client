<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Transaction extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_TRANSACTION);
    }

    public function setId($id)
    {
        return $this->setData(self::FIELD_TRANSACTION_ID, $id);
    }

    public function getId()
    {
        return $this->getData(self::FIELD_TRANSACTION_ID);
    }

    public function setAffiliation($name)
    {
        return $this->setData(self::FIELD_TRANSACTION_AFFILIATION, $name);
    }

    public function getAffiliation()
    {
        return $this->getData(self::FIELD_TRANSACTION_AFFILIATION);
    }

    public function setRevenue($revenue)
    {
        return $this->setData(self::FIELD_TRANSACTION_REVENUE, $revenue);
    }

    public function getRevenue()
    {
        return $this->getData(self::FIELD_TRANSACTION_REVENUE);
    }

    public function setShipping($shipping)
    {
        return $this->setData(self::FIELD_TRANSACTION_SHIPPING, $shipping);
    }

    public function getShipping()
    {
        return $this->getData(self::FIELD_TRANSACTION_SHIPPING);
    }

    public function setTax($tax)
    {
        return $this->setData(self::FIELD_TRANSACTION_TAX, $tax);
    }

    public function getTax()
    {
        return $this->getData(self::FIELD_TRANSACTION_TAX);
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