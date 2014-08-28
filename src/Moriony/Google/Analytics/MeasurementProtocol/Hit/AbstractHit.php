<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class AbstractHit implements HitInterface
{
    protected $client;
    protected $data = [];

    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        $this->client = $client;
        $this->data = $data;
    }

    protected function prepareData()
    {
        return $this->data;
    }

    protected function setData($field, $value)
    {
        $this->data[$field] = $value;
        return $this;
    }

    protected function hasData($field)
    {
        return array_key_exists($field, $this->data);
    }

    protected function getData($field = null, $default = null)
    {
        $value = $default;
        if (is_null($field)) {
            $value = $this->data;
        } else if ($this->hasData($field)) {
            $value = $this->data[$field];
        }
        return $value;
    }

    public function setVersion($version)
    {
        return $this->setData(self::FIELD_VERSION, $version);
    }

    public function getVersion()
    {
        return $this->getData(self::FIELD_VERSION);
    }

    public function setTrackingId($trackingId)
    {
        return $this->setData(self::FIELD_TRACKING_ID, $trackingId);
    }

    public function getTrackingId()
    {
        return $this->getData(self::FIELD_TRACKING_ID);
    }

    public function setCustomerId($customerId)
    {
        return $this->setData(self::FIELD_CUSTOMER_ID, $customerId);
    }

    public function getCustomerId()
    {
        return $this->getData(self::FIELD_CUSTOMER_ID);
    }

    protected function setHitType($hitType)
    {
        return $this->setData(self::FIELD_HIT_TYPE, $hitType);
    }

    public function getHitType()
    {
        return $this->getData(self::FIELD_HIT_TYPE);
    }

    public function setUserIp($ip)
    {
        return $this->setData(self::FIELD_USER_IP, $ip);
    }

    public function getUserIp()
    {
        return $this->getData(self::FIELD_USER_IP);
    }

    public function setUserAgent($userAgent)
    {
        return $this->setData(self::FIELD_USER_AGENT, $userAgent);
    }

    public function getUserAgent()
    {
        return $this->getData(self::FIELD_USER_AGENT);
    }

    /**
     * @return \Guzzle\Http\Message\Response
     */
    public function track()
    {
        $command = $this->getHitType();
        return $this->client->$command($this->prepareData());
    }
}