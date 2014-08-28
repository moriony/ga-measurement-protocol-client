<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class ScreenView extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
        $this->setHitType(self::HIT_TYPE_SCREEN_VIEW);
    }

    public function setAppName($name)
    {
        return $this->setData(self::FIELD_APP_NAME, $name);
    }

    public function getAppName()
    {
        return $this->getData(self::FIELD_APP_NAME);
    }

    public function setAppVersion($version)
    {
        return $this->setData(self::FIELD_APP_VERSION, $version);
    }

    public function getAppVersion()
    {
        return $this->getData(self::FIELD_APP_VERSION);
    }

    public function setAppId($id)
    {
        return $this->setData(self::FIELD_APP_ID, $id);
    }

    public function getAppId()
    {
        return $this->getData(self::FIELD_APP_ID);
    }

    public function setAppInstallerId($id)
    {
        return $this->setData(self::FIELD_APP_INSTALLER_ID, $id);
    }

    public function getAppInstallerId()
    {
        return $this->getData(self::FIELD_APP_INSTALLER_ID);
    }

    public function setContentDescription($description)
    {
        return $this->setData(self::FIELD_CONTENT_DESCRIPTION, $description);
    }

    public function getContentDescription()
    {
        return $this->getData(self::FIELD_CONTENT_DESCRIPTION);
    }
}