<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Transaction extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client)
    {
        parent::__construct($client);
        $this->setHitType(self::HIT_TYPE_TRANSACTION);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::FIELD_TRANSACTION_ID, $id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getData(self::FIELD_TRANSACTION_ID);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setAffiliation($name)
    {
        return $this->setData(self::FIELD_TRANSACTION_AFFILIATION, $name);
    }

    /**
     * @return mixed
     */
    public function getAffiliation()
    {
        return $this->getData(self::FIELD_TRANSACTION_AFFILIATION);
    }

    /**
     * @param string $revenue
     * @return $this
     */
    public function setRevenue($revenue)
    {
        return $this->setData(self::FIELD_TRANSACTION_REVENUE, $revenue);
    }

    /**
     * @return mixed
     */
    public function getRevenue()
    {
        return $this->getData(self::FIELD_TRANSACTION_REVENUE);
    }

    /**
     * @param string $shipping
     * @return $this
     */
    public function setShipping($shipping)
    {
        return $this->setData(self::FIELD_TRANSACTION_SHIPPING, $shipping);
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->getData(self::FIELD_TRANSACTION_SHIPPING);
    }

    /**
     * @param string $tax
     * @return $this
     */
    public function setTax($tax)
    {
        return $this->setData(self::FIELD_TRANSACTION_TAX, $tax);
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->getData(self::FIELD_TRANSACTION_TAX);
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