<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class ScreenView extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client)
    {
        parent::__construct($client);
        $this->setHitType(self::HIT_TYPE_SCREEN_VIEW);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setAppName($name)
    {
        return $this->setData(self::FIELD_APP_NAME, $name);
    }

    /**
     * @return mixed
     */
    public function getAppName()
    {
        return $this->getData(self::FIELD_APP_NAME);
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setAppVersion($version)
    {
        return $this->setData(self::FIELD_APP_VERSION, $version);
    }

    /**
     * @return mixed
     */
    public function getAppVersion()
    {
        return $this->getData(self::FIELD_APP_VERSION);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setAppId($id)
    {
        return $this->setData(self::FIELD_APP_ID, $id);
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->getData(self::FIELD_APP_ID);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setAppInstallerId($id)
    {
        return $this->setData(self::FIELD_APP_INSTALLER_ID, $id);
    }

    /**
     * @return mixed
     */
    public function getAppInstallerId()
    {
        return $this->getData(self::FIELD_APP_INSTALLER_ID);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setContentDescription($description)
    {
        return $this->setData(self::FIELD_CONTENT_DESCRIPTION, $description);
    }

    /**
     * @return mixed
     */
    public function getContentDescription()
    {
        return $this->getData(self::FIELD_CONTENT_DESCRIPTION);
    }
}
