<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

/**
 * @codeCoverageIgnore
 */
interface HitInterface
{
    const HIT_TYPE_PAGE_VIEW = 'pageview';
    const HIT_TYPE_SCREEN_VIEW = 'screenview';
    const HIT_TYPE_EVENT = 'event';
    const HIT_TYPE_TRANSACTION = 'transaction';
    const HIT_TYPE_ITEM = 'item';
    const HIT_TYPE_SOCIAL = 'social';
    const HIT_TYPE_EXCEPTION = 'exception';
    const HIT_TYPE_TIMING = 'timing';

    const FIELD_VERSION = 'v';
    const FIELD_TRACKING_ID = 'tid';
    const FIELD_CUSTOMER_ID = 'cid';
    const FIELD_HIT_TYPE = 't';
    const FIELD_USER_IP = 'uip';
    const FIELD_USER_AGENT = 'ua';
    const FIELD_DOCUMENT_HOSTNAME = 'dh';
    const FIELD_DOCUMENT_PAGE = 'dp';
    const FIELD_DOCUMENT_TITLE = 'dt';
    const FIELD_EVENT_CATEGORY = 'ec';
    const FIELD_EVENT_ACTION = 'ea';
    const FIELD_EVENT_LABEL = 'el';
    const FIELD_EVENT_VALUE = 'ev';
    const FIELD_TIMING_CATEGORY = 'utc';
    const FIELD_TIMING_VARIABLE = 'utv';
    const FIELD_TIMING_TIME = 'utt';
    const FIELD_TIMING_LABEL = 'utl';
    const FIELD_DNS_LOAD_TIME = 'dns';
    const FIELD_PAGE_LOAD_TIME = 'pdt';
    const FIELD_REDIRECT_TIME = 'rrt';
    const FIELD_TCP_CONNECT_TIME = 'tcp';
    const FIELD_SERVER_RESPONSE_TIME = 'srt';
    const FIELD_APP_NAME = 'an';
    const FIELD_APP_VERSION = 'av';
    const FIELD_APP_ID = 'aid';
    const FIELD_APP_INSTALLER_ID = 'aiid';
    const FIELD_CONTENT_DESCRIPTION = 'cd';
    const FIELD_SOCIAL_ACTION = 'sa';
    const FIELD_SOCIAL_NETWORK = 'sn';
    const FIELD_SOCIAL_TARGET = 'st';
    const FIELD_TRANSACTION_ID = 'ti';
    const FIELD_TRANSACTION_AFFILIATION = 'ta';
    const FIELD_TRANSACTION_REVENUE = 'tr';
    const FIELD_TRANSACTION_SHIPPING = 'ts';
    const FIELD_TRANSACTION_TAX = 'tt';
    const FIELD_CURRENCY = 'cu';
    const FIELD_ITEM_NAME = 'in';
    const FIELD_ITEM_PRICE = 'ip';
    const FIELD_ITEM_QUANTITY = 'iq';
    const FIELD_ITEM_CODE = 'ic';
    const FIELD_ITEM_VARIATION = 'iv';
    const FIELD_EXCEPTION_DESCRIPTION = 'exd';
    const FIELD_EXCEPTION_IS_FATAL = 'exf';

    public function __construct(MeasurementProtocolClient $client);
    public function track();
}