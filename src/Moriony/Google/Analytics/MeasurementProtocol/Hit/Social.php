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

    public function setAction($action)
    {
        return $this->setData(self::FIELD_SOCIAL_ACTION, $action);
    }

    public function getAction()
    {
        return $this->getData(self::FIELD_SOCIAL_ACTION);
    }

    public function setNetwork($network)
    {
        return $this->setData(self::FIELD_SOCIAL_NETWORK, $network);
    }

    public function getNetwork()
    {
        return $this->getData(self::FIELD_SOCIAL_NETWORK);
    }

    public function setTarget($target)
    {
        return $this->setData(self::FIELD_SOCIAL_TARGET, $target);
    }

    public function getTarget()
    {
        return $this->getData(self::FIELD_SOCIAL_TARGET);
    }
}