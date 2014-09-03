<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Social extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_SOCIAL);
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        return $this->setData(self::FIELD_SOCIAL_ACTION, $action);
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->getData(self::FIELD_SOCIAL_ACTION);
    }

    /**
     * @param string $network
     * @return $this
     */
    public function setNetwork($network)
    {
        return $this->setData(self::FIELD_SOCIAL_NETWORK, $network);
    }

    /**
     * @return mixed
     */
    public function getNetwork()
    {
        return $this->getData(self::FIELD_SOCIAL_NETWORK);
    }

    /**
     * @param string $target
     * @return $this
     */
    public function setTarget($target)
    {
        return $this->setData(self::FIELD_SOCIAL_TARGET, $target);
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->getData(self::FIELD_SOCIAL_TARGET);
    }
}