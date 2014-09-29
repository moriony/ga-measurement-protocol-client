<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Exception extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client)
    {
        parent::__construct($client);
        $this->setHitType(self::HIT_TYPE_EXCEPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setExceptionDescription($description)
    {
        return $this->setData(self::FIELD_EXCEPTION_DESCRIPTION, $description);
    }

    /**
     * @return mixed
     */
    public function getExceptionDescription()
    {
        return $this->getData(self::FIELD_EXCEPTION_DESCRIPTION);
    }

    /**
     * @param bool $isFatal
     * @return $this
     */
    public function setExceptionIsFatal($isFatal)
    {
        return $this->setData(self::FIELD_EXCEPTION_IS_FATAL, (bool) $isFatal);
    }

    /**
     * @return mixed
     */
    public function getExceptionIsFatal()
    {
        return $this->getData(self::FIELD_EXCEPTION_IS_FATAL);
    }
}
