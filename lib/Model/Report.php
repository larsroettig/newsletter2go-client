<?php
/**
 * Report
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
 * Report Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Report implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Report';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'newsletter_id' => 'string',
        'date' => '\DateTime',
        'mail_count' => 'int',
        'opens' => 'int',
        'unique_opens' => 'int',
        'clicks' => 'int',
        'unique_clicks' => 'int',
        'conversions' => 'int',
        'sum_conversions' => 'int',
        'unsubscribes' => 'int',
        'hard_bounces' => 'int',
        'soft_bounces' => 'int',
        'spam_bounces' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'newsletter_id' => null,
        'date' => 'date',
        'mail_count' => null,
        'opens' => null,
        'unique_opens' => null,
        'clicks' => null,
        'unique_clicks' => null,
        'conversions' => null,
        'sum_conversions' => null,
        'unsubscribes' => null,
        'hard_bounces' => null,
        'soft_bounces' => null,
        'spam_bounces' => null
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
        'newsletter_id' => 'newsletter_id',
        'date' => 'date',
        'mail_count' => 'mail_count',
        'opens' => 'opens',
        'unique_opens' => 'unique_opens',
        'clicks' => 'clicks',
        'unique_clicks' => 'unique_clicks',
        'conversions' => 'conversions',
        'sum_conversions' => 'sum_conversions',
        'unsubscribes' => 'unsubscribes',
        'hard_bounces' => 'hard_bounces',
        'soft_bounces' => 'soft_bounces',
        'spam_bounces' => 'spam_bounces'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'newsletter_id' => 'setNewsletterId',
        'date' => 'setDate',
        'mail_count' => 'setMailCount',
        'opens' => 'setOpens',
        'unique_opens' => 'setUniqueOpens',
        'clicks' => 'setClicks',
        'unique_clicks' => 'setUniqueClicks',
        'conversions' => 'setConversions',
        'sum_conversions' => 'setSumConversions',
        'unsubscribes' => 'setUnsubscribes',
        'hard_bounces' => 'setHardBounces',
        'soft_bounces' => 'setSoftBounces',
        'spam_bounces' => 'setSpamBounces'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'newsletter_id' => 'getNewsletterId',
        'date' => 'getDate',
        'mail_count' => 'getMailCount',
        'opens' => 'getOpens',
        'unique_opens' => 'getUniqueOpens',
        'clicks' => 'getClicks',
        'unique_clicks' => 'getUniqueClicks',
        'conversions' => 'getConversions',
        'sum_conversions' => 'getSumConversions',
        'unsubscribes' => 'getUnsubscribes',
        'hard_bounces' => 'getHardBounces',
        'soft_bounces' => 'getSoftBounces',
        'spam_bounces' => 'getSpamBounces'
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
        $this->container['newsletter_id'] = isset($data['newsletter_id']) ? $data['newsletter_id'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['mail_count'] = isset($data['mail_count']) ? $data['mail_count'] : null;
        $this->container['opens'] = isset($data['opens']) ? $data['opens'] : null;
        $this->container['unique_opens'] = isset($data['unique_opens']) ? $data['unique_opens'] : null;
        $this->container['clicks'] = isset($data['clicks']) ? $data['clicks'] : null;
        $this->container['unique_clicks'] = isset($data['unique_clicks']) ? $data['unique_clicks'] : null;
        $this->container['conversions'] = isset($data['conversions']) ? $data['conversions'] : null;
        $this->container['sum_conversions'] = isset($data['sum_conversions']) ? $data['sum_conversions'] : null;
        $this->container['unsubscribes'] = isset($data['unsubscribes']) ? $data['unsubscribes'] : null;
        $this->container['hard_bounces'] = isset($data['hard_bounces']) ? $data['hard_bounces'] : null;
        $this->container['soft_bounces'] = isset($data['soft_bounces']) ? $data['soft_bounces'] : null;
        $this->container['spam_bounces'] = isset($data['spam_bounces']) ? $data['spam_bounces'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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

        return true;
    }


    /**
     * Gets newsletter_id
     *
     * @return string
     */
    public function getNewsletterId()
    {
        return $this->container['newsletter_id'];
    }

    /**
     * Sets newsletter_id
     *
     * @param string $newsletter_id the id of the newsletter
     *
     * @return $this
     */
    public function setNewsletterId($newsletter_id)
    {
        $this->container['newsletter_id'] = $newsletter_id;

        return $this;
    }

    /**
     * Gets date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param \DateTime $date the date of the aggregation
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets mail_count
     *
     * @return int
     */
    public function getMailCount()
    {
        return $this->container['mail_count'];
    }

    /**
     * Sets mail_count
     *
     * @param int $mail_count the number of recipients reached on this day
     *
     * @return $this
     */
    public function setMailCount($mail_count)
    {
        $this->container['mail_count'] = $mail_count;

        return $this;
    }

    /**
     * Gets opens
     *
     * @return int
     */
    public function getOpens()
    {
        return $this->container['opens'];
    }

    /**
     * Sets opens
     *
     * @param int $opens the number of opens on this day
     *
     * @return $this
     */
    public function setOpens($opens)
    {
        $this->container['opens'] = $opens;

        return $this;
    }

    /**
     * Gets unique_opens
     *
     * @return int
     */
    public function getUniqueOpens()
    {
        return $this->container['unique_opens'];
    }

    /**
     * Sets unique_opens
     *
     * @param int $unique_opens the number of unique opens on this day
     *
     * @return $this
     */
    public function setUniqueOpens($unique_opens)
    {
        $this->container['unique_opens'] = $unique_opens;

        return $this;
    }

    /**
     * Gets clicks
     *
     * @return int
     */
    public function getClicks()
    {
        return $this->container['clicks'];
    }

    /**
     * Sets clicks
     *
     * @param int $clicks the number of clicks on this day
     *
     * @return $this
     */
    public function setClicks($clicks)
    {
        $this->container['clicks'] = $clicks;

        return $this;
    }

    /**
     * Gets unique_clicks
     *
     * @return int
     */
    public function getUniqueClicks()
    {
        return $this->container['unique_clicks'];
    }

    /**
     * Sets unique_clicks
     *
     * @param int $unique_clicks the number of unique clicks on this day
     *
     * @return $this
     */
    public function setUniqueClicks($unique_clicks)
    {
        $this->container['unique_clicks'] = $unique_clicks;

        return $this;
    }

    /**
     * Gets conversions
     *
     * @return int
     */
    public function getConversions()
    {
        return $this->container['conversions'];
    }

    /**
     * Sets conversions
     *
     * @param int $conversions the number of conversions on this day
     *
     * @return $this
     */
    public function setConversions($conversions)
    {
        $this->container['conversions'] = $conversions;

        return $this;
    }

    /**
     * Gets sum_conversions
     *
     * @return int
     */
    public function getSumConversions()
    {
        return $this->container['sum_conversions'];
    }

    /**
     * Sets sum_conversions
     *
     * @param int $sum_conversions the amount recipients spent on this day
     *
     * @return $this
     */
    public function setSumConversions($sum_conversions)
    {
        $this->container['sum_conversions'] = $sum_conversions;

        return $this;
    }

    /**
     * Gets unsubscribes
     *
     * @return int
     */
    public function getUnsubscribes()
    {
        return $this->container['unsubscribes'];
    }

    /**
     * Sets unsubscribes
     *
     * @param int $unsubscribes the number of unsubscribes on this day
     *
     * @return $this
     */
    public function setUnsubscribes($unsubscribes)
    {
        $this->container['unsubscribes'] = $unsubscribes;

        return $this;
    }

    /**
     * Gets hard_bounces
     *
     * @return int
     */
    public function getHardBounces()
    {
        return $this->container['hard_bounces'];
    }

    /**
     * Sets hard_bounces
     *
     * @param int $hard_bounces the number of hard_bounces on this day
     *
     * @return $this
     */
    public function setHardBounces($hard_bounces)
    {
        $this->container['hard_bounces'] = $hard_bounces;

        return $this;
    }

    /**
     * Gets soft_bounces
     *
     * @return int
     */
    public function getSoftBounces()
    {
        return $this->container['soft_bounces'];
    }

    /**
     * Sets soft_bounces
     *
     * @param int $soft_bounces the number of soft_bounces on this day
     *
     * @return $this
     */
    public function setSoftBounces($soft_bounces)
    {
        $this->container['soft_bounces'] = $soft_bounces;

        return $this;
    }

    /**
     * Gets spam_bounces
     *
     * @return int
     */
    public function getSpamBounces()
    {
        return $this->container['spam_bounces'];
    }

    /**
     * Sets spam_bounces
     *
     * @param int $spam_bounces the number of spam_bounces on this day
     *
     * @return $this
     */
    public function setSpamBounces($spam_bounces)
    {
        $this->container['spam_bounces'] = $spam_bounces;

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

