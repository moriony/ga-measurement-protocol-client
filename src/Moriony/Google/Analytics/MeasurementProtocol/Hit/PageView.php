<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class PageView extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client)
    {
        parent::__construct($client);
        $this->setHitType(self::HIT_TYPE_PAGE_VIEW);
    }

    /**
     * @param string $hostname
     * @return $this
     */
    public function setDocumentHostname($hostname)
    {
        return $this->setData(self::FIELD_DOCUMENT_HOSTNAME, $hostname);
    }

    /**
     * @return mixed
     */
    public function getDocumentHostname()
    {
        return $this->getData(self::FIELD_DOCUMENT_HOSTNAME);
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setDocumentPath($path)
    {
        return $this->setData(self::FIELD_DOCUMENT_PATH, $path);
    }

    /**
     * @return mixed
     */
    public function getDocumentPath()
    {
        return $this->getData(self::FIELD_DOCUMENT_PATH);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::FIELD_DOCUMENT_TITLE, $title);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->getData(self::FIELD_DOCUMENT_TITLE);
    }
}
