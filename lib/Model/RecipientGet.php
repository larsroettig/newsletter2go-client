<?php
/**
 * RecipientGet
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Newsletter2Go-API (https://api.newsletter2go.com)
 *
 * <h5>JSON first</h5><br/>Our REST API exchanges data in the JSON data format. Every parameter you pass (with a few exceptions e.g. when you upload files) should therefore be formatted in JSON and our API will always return results in JSON as well.<br/><br/><h5>Very RESTful</h5><br/>Our API follows a very RESTful approach.<br/>Most importantly, we implemented the following four request methods for CRUD operations:<br/><br/>POST - Create a new record<br/>GET - Retrieve / read records without changing anything<br/>PATCH - Update an existing record<br/>DELETE - Delete one or more records<br/><br/><h5>HTTP Status codes</h5><br/>We also follow the most common HTTP status codes when outputting the API response:<br/><br/><b>2xx - Successful calls</b><br/>200 - Success<br/>201 - Created<br/><br/><b>4xx - Error codes</b><br/>400 - API error - inspect the body for detailed information about what went wrong. The most common error is \"code\":1062, which means, that a unique constraint was hit. For example if the name of the group is already in use.<br/>401 - Not authenticated - invalid access_token. Check if the access_token has expired or is incorrect.<br/>403 - Access denied<br/>404 - Call not available or no records found<br/><br/><b>5xx - API error - please contact support</b><br/><br/><h5>Response format</h5><br/>The API always returns data in the following format<br/><br/><code>{<br/>&nbsp;&nbsp;\"info\": {<br/>&nbsp;&nbsp;&nbsp;&nbsp;\"count\": 0<br/>&nbsp;&nbsp;},<br/>&nbsp;&nbsp;\"value\": [<br/>&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;\"key\": \"value\"<br/>&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;]<br/>}</code><br/><br/><h5>Recurring GET parameters</h5><br/><ul><li>_filter - a complex filter for filtering the result set based on <a target=\"blank\" href=\"https://tools.ietf.org/html/draft-nottingham-atompub-fiql-00\">FIQL</a>.</li><li>_limit - the maximum number records returned.</li><li>_offset - pagination for the result-set</li><li>_expand - submit true to get all default fields of the resource</li><li>_fields - submit a comma-separated list of case-sensetive field-names to get the values of these fields in the response. You can use this the get values of custom attribute of recipients for example.</li></ul><br/><br/><h5>Filter language</h5><br/>The filter language for filtering results is based on <a target=\"blank\" href=\"https://tools.ietf.org/html/draft-nottingham-atompub-fiql-00\">FIQL</a>.<br/>With the only restriction, that plain values must be surrounded by \". For example first_name==\"Max\"<br/>The following operators are supported<ul><li>Equals - <b>==</b></li><li>Not equals - <b>=ne=</b></li><li>Greater than - <b>=gt=</b></li><li>Greater than equals - <b>=ge=</b></li><li>Lower than - <b>=lt=</b></li><li>Lower than equals - <b>=le=</b></li><li>Like - <b>=like=</b> (in combination with % you are able to search for <i>starts with</i>, <i>ends with</i>, <i>contains</i>. For example first_name=like=\"%Max%\")</li><li>Not like - <b>=nlike=</b></li><li>Logical and - <b>;</b></li><li>Logical or - <b>,</b></li></ul><br/><br/><h5>How to make Calls?</h5><br/>After you authenticated and received a valid access_token, you have to pass it in every consecutive call. Use the Authorization header for that purpose as follows:<br/><code>xhr.setRequestHeader(\"Authorization\", \"Bearer \" + your_access_token);</code><br/><br/>Every call takes additional parameters that can be used to modify the request. These parameters should be passed as JSON<br/><code>var params = {<br/>&nbsp;&nbsp;\"key\"= \"value\"<br/>}<br/>xhr.send(JSON.stringify(params));</code><br/><br/><h5>Sending transactional emails</h5><br/>It is very important to understand the following concept in order for you to take full advantage of our powerful personalization features and our detailed reports when sending transactional emails.<br/><br/>First, you will have to create a new mailing. We recommend that you create that mailing through our UI in order to take full advantage of our powerful newsletter builder. This way, we will automatically create cross-client optimized and responsive HTML. Yet another advantage lies in the possibility for other users (e.g. the marketing team) to change the layout or the content of the mailing without having to contact the developer (you).<br/><br/>Of course, it is also possible to create a mailing through the API. When doing so, you can also take advantage of our cross-client optimized responsive HTML by passing us JSON or YAML according to the Newsletter2Go Markup Language.<br/>No matter how you create the mailing, try to create *one* reusable template. You can customize individual emails by inserting placeholders for personalized fields such as name, products or other information that will be filled through an API call when sending.<br/><br/>By only creating one template, you can take advantage of our full reporting since all emails will be treated part of a \"campaign\". When you change that template, we will create a new version of the mailing in the background and you will be able to see the difference in performance in the reports. This is particularily useful when you are trying to test and optimize different versions of transactional emails such as a sign up email.<br/><br/>After creating a mailing, you will have access to its ID. Use that ID to actually send the email in the next step.<br/><br/>When sending an email, you have to pass the newsletter ID and information about the recipient. Either pass the recipient ID or pass all the recipient's data (including the e-mail-address) as JSON.<br/><br/>If you only pass the recipient ID, we will use his or her data from your list to personalize the mailing. If you pass full recipient data as JSON, we will try to merge the data with existing data from your list.<br/><br/>You can also pass additional data such as product data which is not saved in your list. Just make sure that the placeholders in the source of the mailing correspond to the parameters that you are passing.<br/>This way you can also create for-loops which can be useful if you pass different amounts of data for each recipient (e.g. a purchase confirmation where you want to list all the products that were just bought).
 *
 * OpenAPI spec version: 1.0.0
 * Contact: support@newsletter2go.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * RecipientGet Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class RecipientGet implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RecipientGet';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'gender' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_unsubscribed' => 'bool',
        'is_bounced' => 'bool',
        'is_blacklisted' => 'bool',
        '_custom_attribute_' => 'string',
        'rating' => 'int',
        'statistic_mails_received' => 'int',
        'statistic_mails_opened' => 'int',
        'statistic_mails_unique_opened' => 'int',
        'statistic_mails_clicked' => 'int',
        'statistic_conversions' => 'int',
        'statistic_conversions_sum' => 'float',
        'statistic_last_mail_action' => '\DateTime',
        'statistic_last_mail_received' => '\DateTime',
        'statistic_last_mail_opened' => '\DateTime',
        'statistic_last_mail_clicked' => '\DateTime',
        'statistic_last_mail_converted' => '\DateTime',
        'statistic_last_useragent_device' => 'string',
        'statistic_last_useragent_family' => 'string',
        'statistic_last_latitude' => 'double',
        'statistic_last_longitude' => 'double',
        'statistic_last_blacklist_list' => '\DateTime',
        'statistic_last_unsubscribe_list' => '\DateTime',
        'statistic_last_blacklist_list_reason' => 'string',
        'statistic_last_unsubscribe_list_reason' => 'string',
        'statistic_last_bounce' => '\DateTime',
        'statistic_last_bounce_reason' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'email' => null,
        'phone' => null,
        'gender' => null,
        'first_name' => null,
        'last_name' => null,
        'is_unsubscribed' => null,
        'is_bounced' => null,
        'is_blacklisted' => null,
        '_custom_attribute_' => null,
        'rating' => null,
        'statistic_mails_received' => null,
        'statistic_mails_opened' => null,
        'statistic_mails_unique_opened' => null,
        'statistic_mails_clicked' => null,
        'statistic_conversions' => null,
        'statistic_conversions_sum' => 'float',
        'statistic_last_mail_action' => 'date-time',
        'statistic_last_mail_received' => 'date-time',
        'statistic_last_mail_opened' => 'date-time',
        'statistic_last_mail_clicked' => 'date-time',
        'statistic_last_mail_converted' => 'date-time',
        'statistic_last_useragent_device' => null,
        'statistic_last_useragent_family' => null,
        'statistic_last_latitude' => 'double',
        'statistic_last_longitude' => 'double',
        'statistic_last_blacklist_list' => 'date-time',
        'statistic_last_unsubscribe_list' => 'date-time',
        'statistic_last_blacklist_list_reason' => null,
        'statistic_last_unsubscribe_list_reason' => null,
        'statistic_last_bounce' => 'date-time',
        'statistic_last_bounce_reason' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'email' => 'email',
        'phone' => 'phone',
        'gender' => 'gender',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'is_unsubscribed' => 'is_unsubscribed',
        'is_bounced' => 'is_bounced',
        'is_blacklisted' => 'is_blacklisted',
        '_custom_attribute_' => '_custom_attribute_',
        'rating' => 'rating',
        'statistic_mails_received' => 'statistic_mails_received',
        'statistic_mails_opened' => 'statistic_mails_opened',
        'statistic_mails_unique_opened' => 'statistic_mails_unique_opened',
        'statistic_mails_clicked' => 'statistic_mails_clicked',
        'statistic_conversions' => 'statistic_conversions',
        'statistic_conversions_sum' => 'statistic_conversions_sum',
        'statistic_last_mail_action' => 'statistic_last_mail_action',
        'statistic_last_mail_received' => 'statistic_last_mail_received',
        'statistic_last_mail_opened' => 'statistic_last_mail_opened',
        'statistic_last_mail_clicked' => 'statistic_last_mail_clicked',
        'statistic_last_mail_converted' => 'statistic_last_mail_converted',
        'statistic_last_useragent_device' => 'statistic_last_useragent_device',
        'statistic_last_useragent_family' => 'statistic_last_useragent_family',
        'statistic_last_latitude' => 'statistic_last_latitude',
        'statistic_last_longitude' => 'statistic_last_longitude',
        'statistic_last_blacklist_list' => 'statistic_last_blacklist_list',
        'statistic_last_unsubscribe_list' => 'statistic_last_unsubscribe_list',
        'statistic_last_blacklist_list_reason' => 'statistic_last_blacklist_list_reason',
        'statistic_last_unsubscribe_list_reason' => 'statistic_last_unsubscribe_list_reason',
        'statistic_last_bounce' => 'statistic_last_bounce',
        'statistic_last_bounce_reason' => 'statistic_last_bounce_reason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'gender' => 'setGender',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'is_unsubscribed' => 'setIsUnsubscribed',
        'is_bounced' => 'setIsBounced',
        'is_blacklisted' => 'setIsBlacklisted',
        '_custom_attribute_' => 'setCustomAttribute_',
        'rating' => 'setRating',
        'statistic_mails_received' => 'setStatisticMailsReceived',
        'statistic_mails_opened' => 'setStatisticMailsOpened',
        'statistic_mails_unique_opened' => 'setStatisticMailsUniqueOpened',
        'statistic_mails_clicked' => 'setStatisticMailsClicked',
        'statistic_conversions' => 'setStatisticConversions',
        'statistic_conversions_sum' => 'setStatisticConversionsSum',
        'statistic_last_mail_action' => 'setStatisticLastMailAction',
        'statistic_last_mail_received' => 'setStatisticLastMailReceived',
        'statistic_last_mail_opened' => 'setStatisticLastMailOpened',
        'statistic_last_mail_clicked' => 'setStatisticLastMailClicked',
        'statistic_last_mail_converted' => 'setStatisticLastMailConverted',
        'statistic_last_useragent_device' => 'setStatisticLastUseragentDevice',
        'statistic_last_useragent_family' => 'setStatisticLastUseragentFamily',
        'statistic_last_latitude' => 'setStatisticLastLatitude',
        'statistic_last_longitude' => 'setStatisticLastLongitude',
        'statistic_last_blacklist_list' => 'setStatisticLastBlacklistList',
        'statistic_last_unsubscribe_list' => 'setStatisticLastUnsubscribeList',
        'statistic_last_blacklist_list_reason' => 'setStatisticLastBlacklistListReason',
        'statistic_last_unsubscribe_list_reason' => 'setStatisticLastUnsubscribeListReason',
        'statistic_last_bounce' => 'setStatisticLastBounce',
        'statistic_last_bounce_reason' => 'setStatisticLastBounceReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'gender' => 'getGender',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'is_unsubscribed' => 'getIsUnsubscribed',
        'is_bounced' => 'getIsBounced',
        'is_blacklisted' => 'getIsBlacklisted',
        '_custom_attribute_' => 'getCustomAttribute_',
        'rating' => 'getRating',
        'statistic_mails_received' => 'getStatisticMailsReceived',
        'statistic_mails_opened' => 'getStatisticMailsOpened',
        'statistic_mails_unique_opened' => 'getStatisticMailsUniqueOpened',
        'statistic_mails_clicked' => 'getStatisticMailsClicked',
        'statistic_conversions' => 'getStatisticConversions',
        'statistic_conversions_sum' => 'getStatisticConversionsSum',
        'statistic_last_mail_action' => 'getStatisticLastMailAction',
        'statistic_last_mail_received' => 'getStatisticLastMailReceived',
        'statistic_last_mail_opened' => 'getStatisticLastMailOpened',
        'statistic_last_mail_clicked' => 'getStatisticLastMailClicked',
        'statistic_last_mail_converted' => 'getStatisticLastMailConverted',
        'statistic_last_useragent_device' => 'getStatisticLastUseragentDevice',
        'statistic_last_useragent_family' => 'getStatisticLastUseragentFamily',
        'statistic_last_latitude' => 'getStatisticLastLatitude',
        'statistic_last_longitude' => 'getStatisticLastLongitude',
        'statistic_last_blacklist_list' => 'getStatisticLastBlacklistList',
        'statistic_last_unsubscribe_list' => 'getStatisticLastUnsubscribeList',
        'statistic_last_blacklist_list_reason' => 'getStatisticLastBlacklistListReason',
        'statistic_last_unsubscribe_list_reason' => 'getStatisticLastUnsubscribeListReason',
        'statistic_last_bounce' => 'getStatisticLastBounce',
        'statistic_last_bounce_reason' => 'getStatisticLastBounceReason'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const GENDER_M = 'm';
    const GENDER_F = 'f';
    const STATISTIC_LAST_USERAGENT_DEVICE_DESKTOP = 'desktop';
    const STATISTIC_LAST_USERAGENT_DEVICE_MOBILE = 'mobile';
    const STATISTIC_LAST_USERAGENT_DEVICE_TABLET = 'tablet';
    const STATISTIC_LAST_USERAGENT_FAMILY_LOTUS_NOTES = 'lotus_notes';
    const STATISTIC_LAST_USERAGENT_FAMILY_APPLE_MAIL = 'apple_mail';
    const STATISTIC_LAST_USERAGENT_FAMILY_THUNDERBIRD = 'thunderbird';
    const STATISTIC_LAST_USERAGENT_FAMILY_WINDOWS_LIVE_MAIL = 'windows_live_mail';
    const STATISTIC_LAST_USERAGENT_FAMILY_OUTLOOK = 'outlook';
    const STATISTIC_LAST_USERAGENT_FAMILY_IOS = 'ios';
    const STATISTIC_LAST_USERAGENT_FAMILY_ANDROID = 'android';
    const STATISTIC_LAST_USERAGENT_FAMILY_WINDOWS = 'windows';
    const STATISTIC_LAST_USERAGENT_FAMILY_WEBMAILER = 'webmailer';
    const STATISTIC_LAST_USERAGENT_FAMILY__ELSE = 'else';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getGenderAllowableValues()
    {
        return [
            self::GENDER_M,
            self::GENDER_F,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatisticLastUseragentDeviceAllowableValues()
    {
        return [
            self::STATISTIC_LAST_USERAGENT_DEVICE_DESKTOP,
            self::STATISTIC_LAST_USERAGENT_DEVICE_MOBILE,
            self::STATISTIC_LAST_USERAGENT_DEVICE_TABLET,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatisticLastUseragentFamilyAllowableValues()
    {
        return [
            self::STATISTIC_LAST_USERAGENT_FAMILY_LOTUS_NOTES,
            self::STATISTIC_LAST_USERAGENT_FAMILY_APPLE_MAIL,
            self::STATISTIC_LAST_USERAGENT_FAMILY_THUNDERBIRD,
            self::STATISTIC_LAST_USERAGENT_FAMILY_WINDOWS_LIVE_MAIL,
            self::STATISTIC_LAST_USERAGENT_FAMILY_OUTLOOK,
            self::STATISTIC_LAST_USERAGENT_FAMILY_IOS,
            self::STATISTIC_LAST_USERAGENT_FAMILY_ANDROID,
            self::STATISTIC_LAST_USERAGENT_FAMILY_WINDOWS,
            self::STATISTIC_LAST_USERAGENT_FAMILY_WEBMAILER,
            self::STATISTIC_LAST_USERAGENT_FAMILY__ELSE,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['gender'] = isset($data['gender']) ? $data['gender'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['is_unsubscribed'] = isset($data['is_unsubscribed']) ? $data['is_unsubscribed'] : null;
        $this->container['is_bounced'] = isset($data['is_bounced']) ? $data['is_bounced'] : null;
        $this->container['is_blacklisted'] = isset($data['is_blacklisted']) ? $data['is_blacklisted'] : null;
        $this->container['_custom_attribute_'] = isset($data['_custom_attribute_']) ? $data['_custom_attribute_'] : null;
        $this->container['rating'] = isset($data['rating']) ? $data['rating'] : null;
        $this->container['statistic_mails_received'] = isset($data['statistic_mails_received']) ? $data['statistic_mails_received'] : null;
        $this->container['statistic_mails_opened'] = isset($data['statistic_mails_opened']) ? $data['statistic_mails_opened'] : null;
        $this->container['statistic_mails_unique_opened'] = isset($data['statistic_mails_unique_opened']) ? $data['statistic_mails_unique_opened'] : null;
        $this->container['statistic_mails_clicked'] = isset($data['statistic_mails_clicked']) ? $data['statistic_mails_clicked'] : null;
        $this->container['statistic_conversions'] = isset($data['statistic_conversions']) ? $data['statistic_conversions'] : null;
        $this->container['statistic_conversions_sum'] = isset($data['statistic_conversions_sum']) ? $data['statistic_conversions_sum'] : null;
        $this->container['statistic_last_mail_action'] = isset($data['statistic_last_mail_action']) ? $data['statistic_last_mail_action'] : null;
        $this->container['statistic_last_mail_received'] = isset($data['statistic_last_mail_received']) ? $data['statistic_last_mail_received'] : null;
        $this->container['statistic_last_mail_opened'] = isset($data['statistic_last_mail_opened']) ? $data['statistic_last_mail_opened'] : null;
        $this->container['statistic_last_mail_clicked'] = isset($data['statistic_last_mail_clicked']) ? $data['statistic_last_mail_clicked'] : null;
        $this->container['statistic_last_mail_converted'] = isset($data['statistic_last_mail_converted']) ? $data['statistic_last_mail_converted'] : null;
        $this->container['statistic_last_useragent_device'] = isset($data['statistic_last_useragent_device']) ? $data['statistic_last_useragent_device'] : null;
        $this->container['statistic_last_useragent_family'] = isset($data['statistic_last_useragent_family']) ? $data['statistic_last_useragent_family'] : null;
        $this->container['statistic_last_latitude'] = isset($data['statistic_last_latitude']) ? $data['statistic_last_latitude'] : null;
        $this->container['statistic_last_longitude'] = isset($data['statistic_last_longitude']) ? $data['statistic_last_longitude'] : null;
        $this->container['statistic_last_blacklist_list'] = isset($data['statistic_last_blacklist_list']) ? $data['statistic_last_blacklist_list'] : null;
        $this->container['statistic_last_unsubscribe_list'] = isset($data['statistic_last_unsubscribe_list']) ? $data['statistic_last_unsubscribe_list'] : null;
        $this->container['statistic_last_blacklist_list_reason'] = isset($data['statistic_last_blacklist_list_reason']) ? $data['statistic_last_blacklist_list_reason'] : null;
        $this->container['statistic_last_unsubscribe_list_reason'] = isset($data['statistic_last_unsubscribe_list_reason']) ? $data['statistic_last_unsubscribe_list_reason'] : null;
        $this->container['statistic_last_bounce'] = isset($data['statistic_last_bounce']) ? $data['statistic_last_bounce'] : null;
        $this->container['statistic_last_bounce_reason'] = isset($data['statistic_last_bounce_reason']) ? $data['statistic_last_bounce_reason'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['email']) && (strlen($this->container['email']) > 64)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['phone']) && (strlen($this->container['phone']) > 32)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 32.";
        }

        $allowedValues = $this->getGenderAllowableValues();
        if (!in_array($this->container['gender'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'gender', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['first_name']) && (strlen($this->container['first_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['last_name']) && (strlen($this->container['last_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 64.";
        }

        $allowedValues = $this->getStatisticLastUseragentDeviceAllowableValues();
        if (!in_array($this->container['statistic_last_useragent_device'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'statistic_last_useragent_device', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatisticLastUseragentFamilyAllowableValues();
        if (!in_array($this->container['statistic_last_useragent_family'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'statistic_last_useragent_family', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if (strlen($this->container['email']) > 64) {
            return false;
        }
        if (strlen($this->container['phone']) > 32) {
            return false;
        }
        $allowedValues = $this->getGenderAllowableValues();
        if (!in_array($this->container['gender'], $allowedValues)) {
            return false;
        }
        if (strlen($this->container['first_name']) > 64) {
            return false;
        }
        if (strlen($this->container['last_name']) > 64) {
            return false;
        }
        $allowedValues = $this->getStatisticLastUseragentDeviceAllowableValues();
        if (!in_array($this->container['statistic_last_useragent_device'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getStatisticLastUseragentFamilyAllowableValues();
        if (!in_array($this->container['statistic_last_useragent_family'], $allowedValues)) {
            return false;
        }
        return true;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id the id of the recipient
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email the email of the recipient
     *
     * @return $this
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (strlen($email) > 64)) {
            throw new \InvalidArgumentException('invalid length for $email when calling RecipientGet., must be smaller than or equal to 64.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone the phone number of the recipient
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        if (!is_null($phone) && (strlen($phone) > 32)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling RecipientGet., must be smaller than or equal to 32.');
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->container['gender'];
    }

    /**
     * Sets gender
     *
     * @param string $gender m for male and f for female
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $allowedValues = $this->getGenderAllowableValues();
        if (!is_null($gender) && !in_array($gender, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'gender', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['gender'] = $gender;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name the first name of the recipient
     *
     * @return $this
     */
    public function setFirstName($first_name)
    {
        if (!is_null($first_name) && (strlen($first_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling RecipientGet., must be smaller than or equal to 64.');
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name the last name of the recipient
     *
     * @return $this
     */
    public function setLastName($last_name)
    {
        if (!is_null($last_name) && (strlen($last_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling RecipientGet., must be smaller than or equal to 64.');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets is_unsubscribed
     *
     * @return bool
     */
    public function getIsUnsubscribed()
    {
        return $this->container['is_unsubscribed'];
    }

    /**
     * Sets is_unsubscribed
     *
     * @param bool $is_unsubscribed weither the recipient is unsubscribed or not
     *
     * @return $this
     */
    public function setIsUnsubscribed($is_unsubscribed)
    {
        $this->container['is_unsubscribed'] = $is_unsubscribed;

        return $this;
    }

    /**
     * Gets is_bounced
     *
     * @return bool
     */
    public function getIsBounced()
    {
        return $this->container['is_bounced'];
    }

    /**
     * Sets is_bounced
     *
     * @param bool $is_bounced weither the recipient is bounced or not
     *
     * @return $this
     */
    public function setIsBounced($is_bounced)
    {
        $this->container['is_bounced'] = $is_bounced;

        return $this;
    }

    /**
     * Gets is_blacklisted
     *
     * @return bool
     */
    public function getIsBlacklisted()
    {
        return $this->container['is_blacklisted'];
    }

    /**
     * Sets is_blacklisted
     *
     * @param bool $is_blacklisted weither the recipient is blacklisted or not
     *
     * @return $this
     */
    public function setIsBlacklisted($is_blacklisted)
    {
        $this->container['is_blacklisted'] = $is_blacklisted;

        return $this;
    }

    /**
     * Gets _custom_attribute_
     *
     * @return string
     */
    public function getCustomAttribute_()
    {
        return $this->container['_custom_attribute_'];
    }

    /**
     * Sets _custom_attribute_
     *
     * @param string $_custom_attribute_ every custom attribute can be submitted
     *
     * @return $this
     */
    public function setCustomAttribute_($_custom_attribute_)
    {
        $this->container['_custom_attribute_'] = $_custom_attribute_;

        return $this;
    }

    /**
     * Gets rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->container['rating'];
    }

    /**
     * Sets rating
     *
     * @param int $rating Indicating the quality of the recipient. Between 0 and 5
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->container['rating'] = $rating;

        return $this;
    }

    /**
     * Gets statistic_mails_received
     *
     * @return int
     */
    public function getStatisticMailsReceived()
    {
        return $this->container['statistic_mails_received'];
    }

    /**
     * Sets statistic_mails_received
     *
     * @param int $statistic_mails_received how many newsletters the recipient has received
     *
     * @return $this
     */
    public function setStatisticMailsReceived($statistic_mails_received)
    {
        $this->container['statistic_mails_received'] = $statistic_mails_received;

        return $this;
    }

    /**
     * Gets statistic_mails_opened
     *
     * @return int
     */
    public function getStatisticMailsOpened()
    {
        return $this->container['statistic_mails_opened'];
    }

    /**
     * Sets statistic_mails_opened
     *
     * @param int $statistic_mails_opened how many newsletters the recipient has opened
     *
     * @return $this
     */
    public function setStatisticMailsOpened($statistic_mails_opened)
    {
        $this->container['statistic_mails_opened'] = $statistic_mails_opened;

        return $this;
    }

    /**
     * Gets statistic_mails_unique_opened
     *
     * @return int
     */
    public function getStatisticMailsUniqueOpened()
    {
        return $this->container['statistic_mails_unique_opened'];
    }

    /**
     * Sets statistic_mails_unique_opened
     *
     * @param int $statistic_mails_unique_opened how many newsletters the recipient has uniqly opened
     *
     * @return $this
     */
    public function setStatisticMailsUniqueOpened($statistic_mails_unique_opened)
    {
        $this->container['statistic_mails_unique_opened'] = $statistic_mails_unique_opened;

        return $this;
    }

    /**
     * Gets statistic_mails_clicked
     *
     * @return int
     */
    public function getStatisticMailsClicked()
    {
        return $this->container['statistic_mails_clicked'];
    }

    /**
     * Sets statistic_mails_clicked
     *
     * @param int $statistic_mails_clicked how often the recipient has clicked on links in newsletters
     *
     * @return $this
     */
    public function setStatisticMailsClicked($statistic_mails_clicked)
    {
        $this->container['statistic_mails_clicked'] = $statistic_mails_clicked;

        return $this;
    }

    /**
     * Gets statistic_conversions
     *
     * @return int
     */
    public function getStatisticConversions()
    {
        return $this->container['statistic_conversions'];
    }

    /**
     * Sets statistic_conversions
     *
     * @param int $statistic_conversions how often the recipient has converted
     *
     * @return $this
     */
    public function setStatisticConversions($statistic_conversions)
    {
        $this->container['statistic_conversions'] = $statistic_conversions;

        return $this;
    }

    /**
     * Gets statistic_conversions_sum
     *
     * @return float
     */
    public function getStatisticConversionsSum()
    {
        return $this->container['statistic_conversions_sum'];
    }

    /**
     * Sets statistic_conversions_sum
     *
     * @param float $statistic_conversions_sum how much the recipient has spent
     *
     * @return $this
     */
    public function setStatisticConversionsSum($statistic_conversions_sum)
    {
        $this->container['statistic_conversions_sum'] = $statistic_conversions_sum;

        return $this;
    }

    /**
     * Gets statistic_last_mail_action
     *
     * @return \DateTime
     */
    public function getStatisticLastMailAction()
    {
        return $this->container['statistic_last_mail_action'];
    }

    /**
     * Sets statistic_last_mail_action
     *
     * @param \DateTime $statistic_last_mail_action when the recipient has had the last interaction with a newsletter
     *
     * @return $this
     */
    public function setStatisticLastMailAction($statistic_last_mail_action)
    {
        $this->container['statistic_last_mail_action'] = $statistic_last_mail_action;

        return $this;
    }

    /**
     * Gets statistic_last_mail_received
     *
     * @return \DateTime
     */
    public function getStatisticLastMailReceived()
    {
        return $this->container['statistic_last_mail_received'];
    }

    /**
     * Sets statistic_last_mail_received
     *
     * @param \DateTime $statistic_last_mail_received when the recipient has had received the last newsletter
     *
     * @return $this
     */
    public function setStatisticLastMailReceived($statistic_last_mail_received)
    {
        $this->container['statistic_last_mail_received'] = $statistic_last_mail_received;

        return $this;
    }

    /**
     * Gets statistic_last_mail_opened
     *
     * @return \DateTime
     */
    public function getStatisticLastMailOpened()
    {
        return $this->container['statistic_last_mail_opened'];
    }

    /**
     * Sets statistic_last_mail_opened
     *
     * @param \DateTime $statistic_last_mail_opened when the recipient has had opened the last newsletter
     *
     * @return $this
     */
    public function setStatisticLastMailOpened($statistic_last_mail_opened)
    {
        $this->container['statistic_last_mail_opened'] = $statistic_last_mail_opened;

        return $this;
    }

    /**
     * Gets statistic_last_mail_clicked
     *
     * @return \DateTime
     */
    public function getStatisticLastMailClicked()
    {
        return $this->container['statistic_last_mail_clicked'];
    }

    /**
     * Sets statistic_last_mail_clicked
     *
     * @param \DateTime $statistic_last_mail_clicked when the recipient has had clicked the last newsletter
     *
     * @return $this
     */
    public function setStatisticLastMailClicked($statistic_last_mail_clicked)
    {
        $this->container['statistic_last_mail_clicked'] = $statistic_last_mail_clicked;

        return $this;
    }

    /**
     * Gets statistic_last_mail_converted
     *
     * @return \DateTime
     */
    public function getStatisticLastMailConverted()
    {
        return $this->container['statistic_last_mail_converted'];
    }

    /**
     * Sets statistic_last_mail_converted
     *
     * @param \DateTime $statistic_last_mail_converted when the recipient has had converted the last time
     *
     * @return $this
     */
    public function setStatisticLastMailConverted($statistic_last_mail_converted)
    {
        $this->container['statistic_last_mail_converted'] = $statistic_last_mail_converted;

        return $this;
    }

    /**
     * Gets statistic_last_useragent_device
     *
     * @return string
     */
    public function getStatisticLastUseragentDevice()
    {
        return $this->container['statistic_last_useragent_device'];
    }

    /**
     * Sets statistic_last_useragent_device
     *
     * @param string $statistic_last_useragent_device the last useragent device used for opening a newsletter
     *
     * @return $this
     */
    public function setStatisticLastUseragentDevice($statistic_last_useragent_device)
    {
        $allowedValues = $this->getStatisticLastUseragentDeviceAllowableValues();
        if (!is_null($statistic_last_useragent_device) && !in_array($statistic_last_useragent_device, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'statistic_last_useragent_device', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['statistic_last_useragent_device'] = $statistic_last_useragent_device;

        return $this;
    }

    /**
     * Gets statistic_last_useragent_family
     *
     * @return string
     */
    public function getStatisticLastUseragentFamily()
    {
        return $this->container['statistic_last_useragent_family'];
    }

    /**
     * Sets statistic_last_useragent_family
     *
     * @param string $statistic_last_useragent_family the last useragent family used for opening a newsletter
     *
     * @return $this
     */
    public function setStatisticLastUseragentFamily($statistic_last_useragent_family)
    {
        $allowedValues = $this->getStatisticLastUseragentFamilyAllowableValues();
        if (!is_null($statistic_last_useragent_family) && !in_array($statistic_last_useragent_family, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'statistic_last_useragent_family', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['statistic_last_useragent_family'] = $statistic_last_useragent_family;

        return $this;
    }

    /**
     * Gets statistic_last_latitude
     *
     * @return double
     */
    public function getStatisticLastLatitude()
    {
        return $this->container['statistic_last_latitude'];
    }

    /**
     * Sets statistic_last_latitude
     *
     * @param double $statistic_last_latitude the last latitude where the recipient has opened a newsletter
     *
     * @return $this
     */
    public function setStatisticLastLatitude($statistic_last_latitude)
    {
        $this->container['statistic_last_latitude'] = $statistic_last_latitude;

        return $this;
    }

    /**
     * Gets statistic_last_longitude
     *
     * @return double
     */
    public function getStatisticLastLongitude()
    {
        return $this->container['statistic_last_longitude'];
    }

    /**
     * Sets statistic_last_longitude
     *
     * @param double $statistic_last_longitude the last longitude where the recipient has opened a newsletter
     *
     * @return $this
     */
    public function setStatisticLastLongitude($statistic_last_longitude)
    {
        $this->container['statistic_last_longitude'] = $statistic_last_longitude;

        return $this;
    }

    /**
     * Gets statistic_last_blacklist_list
     *
     * @return \DateTime
     */
    public function getStatisticLastBlacklistList()
    {
        return $this->container['statistic_last_blacklist_list'];
    }

    /**
     * Sets statistic_last_blacklist_list
     *
     * @param \DateTime $statistic_last_blacklist_list when the recipient was blacklisted the last time
     *
     * @return $this
     */
    public function setStatisticLastBlacklistList($statistic_last_blacklist_list)
    {
        $this->container['statistic_last_blacklist_list'] = $statistic_last_blacklist_list;

        return $this;
    }

    /**
     * Gets statistic_last_unsubscribe_list
     *
     * @return \DateTime
     */
    public function getStatisticLastUnsubscribeList()
    {
        return $this->container['statistic_last_unsubscribe_list'];
    }

    /**
     * Sets statistic_last_unsubscribe_list
     *
     * @param \DateTime $statistic_last_unsubscribe_list when the recipient was unsubscribed the last time
     *
     * @return $this
     */
    public function setStatisticLastUnsubscribeList($statistic_last_unsubscribe_list)
    {
        $this->container['statistic_last_unsubscribe_list'] = $statistic_last_unsubscribe_list;

        return $this;
    }

    /**
     * Gets statistic_last_blacklist_list_reason
     *
     * @return string
     */
    public function getStatisticLastBlacklistListReason()
    {
        return $this->container['statistic_last_blacklist_list_reason'];
    }

    /**
     * Sets statistic_last_blacklist_list_reason
     *
     * @param string $statistic_last_blacklist_list_reason the reason the recipient got blacklisted the last time
     *
     * @return $this
     */
    public function setStatisticLastBlacklistListReason($statistic_last_blacklist_list_reason)
    {
        $this->container['statistic_last_blacklist_list_reason'] = $statistic_last_blacklist_list_reason;

        return $this;
    }

    /**
     * Gets statistic_last_unsubscribe_list_reason
     *
     * @return string
     */
    public function getStatisticLastUnsubscribeListReason()
    {
        return $this->container['statistic_last_unsubscribe_list_reason'];
    }

    /**
     * Sets statistic_last_unsubscribe_list_reason
     *
     * @param string $statistic_last_unsubscribe_list_reason the reason the recipient got unsubscribed the last time
     *
     * @return $this
     */
    public function setStatisticLastUnsubscribeListReason($statistic_last_unsubscribe_list_reason)
    {
        $this->container['statistic_last_unsubscribe_list_reason'] = $statistic_last_unsubscribe_list_reason;

        return $this;
    }

    /**
     * Gets statistic_last_bounce
     *
     * @return \DateTime
     */
    public function getStatisticLastBounce()
    {
        return $this->container['statistic_last_bounce'];
    }

    /**
     * Sets statistic_last_bounce
     *
     * @param \DateTime $statistic_last_bounce when the recipient is bounced the last time
     *
     * @return $this
     */
    public function setStatisticLastBounce($statistic_last_bounce)
    {
        $this->container['statistic_last_bounce'] = $statistic_last_bounce;

        return $this;
    }

    /**
     * Gets statistic_last_bounce_reason
     *
     * @return string
     */
    public function getStatisticLastBounceReason()
    {
        return $this->container['statistic_last_bounce_reason'];
    }

    /**
     * Sets statistic_last_bounce_reason
     *
     * @param string $statistic_last_bounce_reason the reason the recipient is bounced the last time
     *
     * @return $this
     */
    public function setStatisticLastBounceReason($statistic_last_bounce_reason)
    {
        $this->container['statistic_last_bounce_reason'] = $statistic_last_bounce_reason;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param  integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param  integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param  integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

