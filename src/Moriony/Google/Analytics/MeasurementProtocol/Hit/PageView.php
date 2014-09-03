<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class PageView extends AbstractHit
{
    public function __construct(MeasurementProtocolClient $client, array $data = array())
    {
        parent::__construct($client, $data);
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
     * @param string $page
     * @return $this
     */
    public function setPage($page)
    {
        return $this->setData(self::FIELD_DOCUMENT_PAGE, $page);
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->getData(self::FIELD_DOCUMENT_PAGE);
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