<?php

namespace Moriony\Google\Analytics\MeasurementProtocol;

use Moriony\Google\Analytics\MeasurementProtocol\Hit\Event;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\Exception;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\HitInterface;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\Item;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\PageView;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\Social;
use Moriony\Google\Analytics\MeasurementProtocol\Hit\Transaction;
use Moriony\Google\Analytics\MeasurementProtocol\Plugin\DefaultData;
use Moriony\Google\Analytics\MeasurementProtocol\Plugin\PluginInterface;
use Guzzle\Common\Collection;
use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

class Client
{
    const OPT_SLL = 'ssl';
    const OPT_TRACKING_ID = 'tracking_id';
    const OPT_PLUGINS = 'plugins';

    /** @var  MeasurementProtocolClient */
    protected $client;
    protected static $defaultOptions = [
        self::OPT_SLL => false,
        self::OPT_PLUGINS => array()
    ];
    protected static $requiredOptions = [
        self::OPT_TRACKING_ID,
    ];

    public function __construct($options)
    {
        $options = Collection::fromConfig($options, self::$defaultOptions, self::$requiredOptions);
        $this->client = MeasurementProtocolClient::factory(array(
            'ssl' => $options->get(self::OPT_SLL),
        ));
        $this->registerPlugin(new DefaultData(array(
            HitInterface::FIELD_VERSION => 1,
            HitInterface::FIELD_TRACKING_ID => $options->get(self::OPT_TRACKING_ID)
        )));
        $this->registerPlugins($options->get(self::OPT_PLUGINS));
    }

    /**
     * @param PluginInterface[] $plugins
     * @return $this
     */
    public function registerPlugins(array $plugins)
    {
        foreach ($plugins as $plugin) {
            $this->registerPlugin($plugin);
        }
        return $this;
    }

    public function registerPlugin(PluginInterface $plugin)
    {
        $plugin->register($this->client);
        return $this;
    }

    public function createPageView()
    {
        return new PageView($this->client);
    }

    public function createEvent()
    {
        return new Event($this->client);
    }

    public function createTransaction()
    {
        return new Transaction($this->client);
    }

    public function createItem()
    {
        return new Item($this->client);
    }

    public function createSocial()
    {
        return new Social($this->client);
    }

    public function createException()
    {
        return new Exception($this->client);
    }
}