<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Timing extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_TIMING);
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        return $this->setData(self::FIELD_TIMING_CATEGORY, $category);
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->getData(self::FIELD_TIMING_CATEGORY);
    }

    /**
     * @param string $variable
     * @return $this
     */
    public function setVariable($variable)
    {
        return $this->setData(self::FIELD_TIMING_VARIABLE, $variable);
    }

    /**
     * @return mixed
     */
    public function getVariable()
    {
        return $this->getData(self::FIELD_TIMING_VARIABLE);
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        return $this->setData(self::FIELD_TIMING_TIME, $time);
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->getData(self::FIELD_TIMING_TIME);
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        return $this->setData(self::FIELD_TIMING_LABEL, $label);
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->getData(self::FIELD_TIMING_LABEL);
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setDnsLoadTime($time)
    {
        return $this->setData(self::FIELD_DNS_LOAD_TIME, $time);
    }

    public function getDnsLoadTime()
    {
        return $this->getData(self::FIELD_DNS_LOAD_TIME);
    }

    public function setPageLoadTime($time)
    {
        return $this->setData(self::FIELD_PAGE_LOAD_TIME, $time);
    }

    public function getPageLoadTime()
    {
        return $this->getData(self::FIELD_PAGE_LOAD_TIME);
    }

    public function setRedirectTime($time)
    {
        return $this->setData(self::FIELD_REDIRECT_TIME, $time);
    }

    public function getRedirectTime()
    {
        return $this->getData(self::FIELD_REDIRECT_TIME);
    }

    public function setTcpConnectTime($time)
    {
        return $this->setData(self::FIELD_TCP_CONNECT_TIME, $time);
    }

    public function getTcpConnectTime()
    {
        return $this->getData(self::FIELD_TCP_CONNECT_TIME);
    }

    public function setServerResponseTime($time)
    {
        return $this->setData(self::FIELD_SERVER_RESPONSE_TIME, $time);
    }

    public function getServerResponseTime()
    {
        return $this->getData(self::FIELD_SERVER_RESPONSE_TIME);
    }
}