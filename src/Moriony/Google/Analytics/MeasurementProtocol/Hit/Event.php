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

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        return $this->setData(self::FIELD_EVENT_CATEGORY, $category);
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->getData(self::FIELD_EVENT_CATEGORY);
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        return $this->setData(self::FIELD_EVENT_ACTION, $action);
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->getData(self::FIELD_EVENT_ACTION);
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        return $this->setData(self::FIELD_EVENT_LABEL, $label);
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->getData(self::FIELD_EVENT_LABEL);
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setData(self::FIELD_EVENT_VALUE, $value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getData(self::FIELD_EVENT_VALUE);
    }
}