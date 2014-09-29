<?php

namespace Moriony\Google\Analytics\MeasurementProtocol\Hit;

use Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient;

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

    // General
    const FIELD_VERSION = 'v';
    const FIELD_TRACKING_ID = 'tid';
    const FIELD_ANONIMIZE_IP = 'aip';
    const FIELD_QUEUE_TIME = 'qt';
    const FIELD_CACHE_BUSTER = 'z';

    // User
    const FIELD_CUSTOMER_ID = 'cid';
    const FIELD_USER_ID = 'uid';

    // Session
    const FIELD_SESSION_CONTROL = 'sc';
    const FIELD_USER_IP = 'uip';
    const FIELD_USER_AGENT = 'ua';

    // Traffic sources
    const FIELD_DOCUMENT_REFERRER = 'dr';
    const FIELD_CAMPAIGN_NAME = 'cn';
    const FIELD_CAMPAIGN_SOURCE = 'cs';
    const FIELD_CAMPAIGN_MEDIUM = 'cm';
    const FIELD_CAMPAIGN_KEYWORD = 'ck';
    const FIELD_CAMPAIGN_CONTENT = 'cc';
    const FIELD_CAMPAIGN_ID = 'ci';
    const FIELD_ADWORDS_ID = 'gclid';
    const FIELD_DISPLAY_ADS_ID = 'dclid';

    // System info
    const FIELD_SCREEN_RESOLUTION = 'sr';
    const FIELD_VIEW_PORT_SIZE = 'vp';
    const FIELD_DOCUMENT_ENCODING = 'de';
    const FIELD_SCREEN_COLORS = 'sd';
    const FIELD_USER_LANGUAGE = 'ul';
    const FIELD_JAVA_ENABLED = 'je';
    const FIELD_FLASH_VERSION = 'fl';

    // Hit
    const FIELD_HIT_TYPE = 't';
    const FIELD_NON_INTERACTION_HIT = 'ni';

    // Content information
    const FIELD_DOCUMENT_TITLE = 'dt';
    const FIELD_DOCUMENT_LOCATION_URL = 'dl';
    const FIELD_DOCUMENT_HOSTNAME = 'dh';
    const FIELD_DOCUMENT_PATH = 'dp';
    const FIELD_CONTENT_DESCRIPTION = 'cd';
    const FIELD_LINK_ID = 'linkid';

    // App tracking
    const FIELD_APP_NAME = 'an';
    const FIELD_APP_VERSION = 'av';
    const FIELD_APP_ID = 'aid';
    const FIELD_APP_INSTALLER_ID = 'aiid';

    // Event tracking
    const FIELD_EVENT_CATEGORY = 'ec';
    const FIELD_EVENT_ACTION = 'ea';
    const FIELD_EVENT_LABEL = 'el';
    const FIELD_EVENT_VALUE = 'ev';

    // E-Commerce
    const FIELD_TRANSACTION_ID = 'ti';
    const FIELD_TRANSACTION_AFFILIATION = 'ta';
    const FIELD_TRANSACTION_REVENUE = 'tr';
    const FIELD_TRANSACTION_SHIPPING = 'ts';
    const FIELD_TRANSACTION_TAX = 'tt';
    const FIELD_ITEM_NAME = 'in';
    const FIELD_ITEM_PRICE = 'ip';
    const FIELD_ITEM_QUANTITY = 'iq';
    const FIELD_ITEM_CODE = 'ic';
    const FIELD_ITEM_VARIATION = 'iv';
    const FIELD_CURRENCY = 'cu';

    // Enchanted E-Commerce
    const FIELD_ENCHANTED_PRODUCT_SKU = 'pr%did';
    const FIELD_ENCHANTED_PRODUCT_NAME = 'pr%dnm';
    const FIELD_ENCHANTED_PRODUCT_BRAND = 'pr%dbr';
    const FIELD_ENCHANTED_PRODUCT_CATEGORY = 'pr%dca';
    const FIELD_ENCHANTED_PRODUCT_VARIANT = 'pr%dva';
    const FIELD_ENCHANTED_PRODUCT_PRICE = 'pr%dpr';
    const FIELD_ENCHANTED_PRODUCT_QUANTITY = 'pr%dqt';
    const FIELD_ENCHANTED_PRODUCT_COUPON_CODE = 'pr%dcc';
    const FIELD_ENCHANTED_PRODUCT_POSITION = 'pr%dps';
    const FIELD_ENCHANTED_PRODUCT_CUSTOM_DIMENSION = 'pr%dcd%d';
    const FIELD_ENCHANTED_PRODUCT_CUSTOM_METRIC = 'pr%dcm%d';
    const FIELD_PRODUCT_ACTION = 'pa';
    const FIELD_TRANSACTION_COUPON_CODE = 'tcc';
    const FIELD_PRODUCT_ACTION_LIST = 'pal';
    const FIELD_CHECKOUT_STEP = 'cos';
    const FIELD_CHECKOUT_STEP_OPTION = 'col';
    const FIELD_PRODUCT_IMPRESSION_LIST_NAME = 'il%dnm';
    const FIELD_PRODUCT_IMPRESSION_SKU = 'il%dpi%did';
    const FIELD_PRODUCT_IMPRESSION_NAME = 'il%dpi%dnm';
    const FIELD_PRODUCT_IMPRESSION_BRAND = 'il%dpi%dbr';
    const FIELD_PRODUCT_IMPRESSION_CATEGORY_AND_VARIANT = 'il%dpi%dca';
    const FIELD_PRODUCT_IMPRESSION_PRICE = 'il%dpi%dpr';
    const FIELD_PRODUCT_IMPRESSION_CUSTOM_DIMENSION = 'il%dpi%dcd%d';
    const FIELD_PRODUCT_IMPRESSION_CUSTOM_METRIC = 'il%dpi%dcm';
    const FIELD_PROMOTION_ID = 'promo%did';
    const FIELD_PROMOTION_NAME = 'promo%dnm';
    const FIELD_PROMOTION_CREATIVE = 'promo%dcr';
    const FIELD_PROMOTION_POSITION = 'promo%dps';
    const FIELD_PROMOTION_ACTION = 'promoa';

    // Social interactions
    const FIELD_SOCIAL_ACTION = 'sa';
    const FIELD_SOCIAL_NETWORK = 'sn';
    const FIELD_SOCIAL_TARGET = 'st';

    // Timing
    const FIELD_TIMING_CATEGORY = 'utc';
    const FIELD_TIMING_VARIABLE = 'utv';
    const FIELD_TIMING_TIME = 'utt';
    const FIELD_TIMING_LABEL = 'utl';
    const FIELD_DNS_LOAD_TIME = 'dns';
    const FIELD_PAGE_LOAD_TIME = 'plt';
    const FIELD_PAGE_DOWNLOAD_TIME = 'pdt';
    const FIELD_REDIRECT_TIME = 'rrt';
    const FIELD_TCP_CONNECT_TIME = 'tcp';
    const FIELD_SERVER_RESPONSE_TIME = 'srt';

    // Exceptions
    const FIELD_EXCEPTION_DESCRIPTION = 'exd';
    const FIELD_EXCEPTION_IS_FATAL = 'exf';

    // Custom dimensions
    const FIELD_CUSTOM_DIMENSION = 'cd%d';
    const FIELD_CUSTOM_METRIC = 'cm%d';

    // Content Experiments
    const FIELD_EXPERIMENT_ID = 'xid';
    const FIELD_EXPERIMENT_VARIANT = 'xvar';

    public function __construct(MeasurementProtocolClient $client);
    public function track();
}
