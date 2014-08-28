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

    public function setDocumentHostname($hostname)
    {
        return $this->setData(self::FIELD_DOCUMENT_HOSTNAME, $hostname);
    }

    public function getDocumentHostname()
    {
        return $this->getData(self::FIELD_DOCUMENT_HOSTNAME);
    }

    public function setPage($page)
    {
        return $this->setData(self::FIELD_DOCUMENT_PAGE, $page);
    }

    public function getPage()
    {
        return $this->getData(self::FIELD_DOCUMENT_PAGE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::FIELD_DOCUMENT_TITLE, $title);
    }

    public function getTitle()
    {
        return $this->getData(self::FIELD_DOCUMENT_TITLE);
    }
}