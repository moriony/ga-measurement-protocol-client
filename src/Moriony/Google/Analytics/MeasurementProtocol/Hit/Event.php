<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Event extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_EVENT);
    }

    public function setCategory($category)
    {
        return $this->setData(self::FIELD_EVENT_CATEGORY, $category);
    }

    public function getCategory()
    {
        return $this->getData(self::FIELD_EVENT_CATEGORY);
    }

    public function setAction($action)
    {
        return $this->setData(self::FIELD_EVENT_ACTION, $action);
    }

    public function getAction()
    {
        return $this->getData(self::FIELD_EVENT_ACTION);
    }

    public function setLabel($label)
    {
        return $this->setData(self::FIELD_EVENT_LABEL, $label);
    }

    public function getLabel()
    {
        return $this->getData(self::FIELD_EVENT_LABEL);
    }

    public function setValue($value)
    {
        return $this->setData(self::FIELD_EVENT_VALUE, $value);
    }

    public function getValue()
    {
        return $this->getData(self::FIELD_EVENT_VALUE);
    }

    public function prepareData()
    {
        return parent::prepareData();
    }
}