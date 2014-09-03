<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class AbstractHit implements HitInterface
{
    protected $client;
    protected $data = array();

    public function __construct(MeasurementProtocolClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    protected function setData($field, $value)
    {
        $this->data[$field] = $value;
        return $this;
    }

    /**
     * @param string $field
     * @return bool
     */
    protected function hasData($field)
    {
        return array_key_exists($field, $this->data);
    }

    /**
     * @param string|null $field
     * @param mixed $default
     * @return mixed
     */
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

    /**
     * @param int $version
     * @return $this
     */
    public function setVersion($version)
    {
        return $this->setData(self::FIELD_VERSION, $version);
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->getData(self::FIELD_VERSION);
    }

    /**
     * @param string $trackingId
     * @return $this
     */
    public function setTrackingId($trackingId)
    {
        return $this->setData(self::FIELD_TRACKING_ID, $trackingId);
    }

    /**
     * @return mixed
     */
    public function getTrackingId()
    {
        return $this->getData(self::FIELD_TRACKING_ID);
    }

    /**
     * @param string $customerId
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::FIELD_CUSTOMER_ID, $customerId);
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->getData(self::FIELD_CUSTOMER_ID);
    }

    /**
     * @param string $hitType
     * @return $this
     */
    protected function setHitType($hitType)
    {
        return $this->setData(self::FIELD_HIT_TYPE, $hitType);
    }

    /**
     * @return mixed
     */
    public function getHitType()
    {
        return $this->getData(self::FIELD_HIT_TYPE);
    }

    /**
     * @param string $ip
     * @return $this
     */
    public function setUserIp($ip)
    {
        return $this->setData(self::FIELD_USER_IP, $ip);
    }

    /**
     * @return mixed
     */
    public function getUserIp()
    {
        return $this->getData(self::FIELD_USER_IP);
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        return $this->setData(self::FIELD_USER_AGENT, $userAgent);
    }

    /**
     * @return mixed
     */
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
        return $this->client->$command($this->getData());
    }
}