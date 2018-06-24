<?php
/**
 * ListGet
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
 * ListGet Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ListGet implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ListGet';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'name' => 'string',
        'uses_econda' => 'bool',
        'uses_googleanalytics' => 'bool',
        'has_opentracking' => 'bool',
        'has_clicktracking' => 'bool',
        'has_conversiontracking' => 'bool',
        'imprint' => 'string',
        'header_from_email' => 'string',
        'header_from_name' => 'string',
        'header_reply_email' => 'string',
        'header_reply_name' => 'string',
        'tracking_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'name' => null,
        'uses_econda' => null,
        'uses_googleanalytics' => null,
        'has_opentracking' => null,
        'has_clicktracking' => null,
        'has_conversiontracking' => null,
        'imprint' => null,
        'header_from_email' => null,
        'header_from_name' => null,
        'header_reply_email' => null,
        'header_reply_name' => null,
        'tracking_url' => null
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
        'name' => 'name',
        'uses_econda' => 'uses_econda',
        'uses_googleanalytics' => 'uses_googleanalytics',
        'has_opentracking' => 'has_opentracking',
        'has_clicktracking' => 'has_clicktracking',
        'has_conversiontracking' => 'has_conversiontracking',
        'imprint' => 'imprint',
        'header_from_email' => 'header_from_email',
        'header_from_name' => 'header_from_name',
        'header_reply_email' => 'header_reply_email',
        'header_reply_name' => 'header_reply_name',
        'tracking_url' => 'tracking_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'uses_econda' => 'setUsesEconda',
        'uses_googleanalytics' => 'setUsesGoogleanalytics',
        'has_opentracking' => 'setHasOpentracking',
        'has_clicktracking' => 'setHasClicktracking',
        'has_conversiontracking' => 'setHasConversiontracking',
        'imprint' => 'setImprint',
        'header_from_email' => 'setHeaderFromEmail',
        'header_from_name' => 'setHeaderFromName',
        'header_reply_email' => 'setHeaderReplyEmail',
        'header_reply_name' => 'setHeaderReplyName',
        'tracking_url' => 'setTrackingUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'uses_econda' => 'getUsesEconda',
        'uses_googleanalytics' => 'getUsesGoogleanalytics',
        'has_opentracking' => 'getHasOpentracking',
        'has_clicktracking' => 'getHasClicktracking',
        'has_conversiontracking' => 'getHasConversiontracking',
        'imprint' => 'getImprint',
        'header_from_email' => 'getHeaderFromEmail',
        'header_from_name' => 'getHeaderFromName',
        'header_reply_email' => 'getHeaderReplyEmail',
        'header_reply_name' => 'getHeaderReplyName',
        'tracking_url' => 'getTrackingUrl'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['uses_econda'] = isset($data['uses_econda']) ? $data['uses_econda'] : null;
        $this->container['uses_googleanalytics'] = isset($data['uses_googleanalytics']) ? $data['uses_googleanalytics'] : null;
        $this->container['has_opentracking'] = isset($data['has_opentracking']) ? $data['has_opentracking'] : null;
        $this->container['has_clicktracking'] = isset($data['has_clicktracking']) ? $data['has_clicktracking'] : null;
        $this->container['has_conversiontracking'] = isset($data['has_conversiontracking']) ? $data['has_conversiontracking'] : null;
        $this->container['imprint'] = isset($data['imprint']) ? $data['imprint'] : null;
        $this->container['header_from_email'] = isset($data['header_from_email']) ? $data['header_from_email'] : null;
        $this->container['header_from_name'] = isset($data['header_from_name']) ? $data['header_from_name'] : null;
        $this->container['header_reply_email'] = isset($data['header_reply_email']) ? $data['header_reply_email'] : null;
        $this->container['header_reply_name'] = isset($data['header_reply_name']) ? $data['header_reply_name'] : null;
        $this->container['tracking_url'] = isset($data['tracking_url']) ? $data['tracking_url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['name']) && (strlen($this->container['name']) > 64)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['imprint']) && (strlen($this->container['imprint']) > 256)) {
            $invalidProperties[] = "invalid value for 'imprint', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['header_from_email']) && (strlen($this->container['header_from_email']) > 256)) {
            $invalidProperties[] = "invalid value for 'header_from_email', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['header_from_name']) && (strlen($this->container['header_from_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'header_from_name', the character length must be smaller than or equal to 128.";
        }

        if (!is_null($this->container['header_reply_email']) && (strlen($this->container['header_reply_email']) > 256)) {
            $invalidProperties[] = "invalid value for 'header_reply_email', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['header_reply_name']) && (strlen($this->container['header_reply_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'header_reply_name', the character length must be smaller than or equal to 128.";
        }

        if (!is_null($this->container['tracking_url']) && (strlen($this->container['tracking_url']) > 128)) {
            $invalidProperties[] = "invalid value for 'tracking_url', the character length must be smaller than or equal to 128.";
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

        if (strlen($this->container['name']) > 64) {
            return false;
        }
        if (strlen($this->container['imprint']) > 256) {
            return false;
        }
        if (strlen($this->container['header_from_email']) > 256) {
            return false;
        }
        if (strlen($this->container['header_from_name']) > 128) {
            return false;
        }
        if (strlen($this->container['header_reply_email']) > 256) {
            return false;
        }
        if (strlen($this->container['header_reply_name']) > 128) {
            return false;
        }
        if (strlen($this->container['tracking_url']) > 128) {
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
     * @param string $id the id of the list
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name the name of the list
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (strlen($name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ListGet., must be smaller than or equal to 64.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets uses_econda
     *
     * @return bool
     */
    public function getUsesEconda()
    {
        return $this->container['uses_econda'];
    }

    /**
     * Sets uses_econda
     *
     * @param bool $uses_econda uses econda tracking or not
     *
     * @return $this
     */
    public function setUsesEconda($uses_econda)
    {
        $this->container['uses_econda'] = $uses_econda;

        return $this;
    }

    /**
     * Gets uses_googleanalytics
     *
     * @return bool
     */
    public function getUsesGoogleanalytics()
    {
        return $this->container['uses_googleanalytics'];
    }

    /**
     * Sets uses_googleanalytics
     *
     * @param bool $uses_googleanalytics uses google-analytics tracking or not
     *
     * @return $this
     */
    public function setUsesGoogleanalytics($uses_googleanalytics)
    {
        $this->container['uses_googleanalytics'] = $uses_googleanalytics;

        return $this;
    }

    /**
     * Gets has_opentracking
     *
     * @return bool
     */
    public function getHasOpentracking()
    {
        return $this->container['has_opentracking'];
    }

    /**
     * Sets has_opentracking
     *
     * @param bool $has_opentracking uses open-tracking tracking or not
     *
     * @return $this
     */
    public function setHasOpentracking($has_opentracking)
    {
        $this->container['has_opentracking'] = $has_opentracking;

        return $this;
    }

    /**
     * Gets has_clicktracking
     *
     * @return bool
     */
    public function getHasClicktracking()
    {
        return $this->container['has_clicktracking'];
    }

    /**
     * Sets has_clicktracking
     *
     * @param bool $has_clicktracking uses click-tracking tracking or not
     *
     * @return $this
     */
    public function setHasClicktracking($has_clicktracking)
    {
        $this->container['has_clicktracking'] = $has_clicktracking;

        return $this;
    }

    /**
     * Gets has_conversiontracking
     *
     * @return bool
     */
    public function getHasConversiontracking()
    {
        return $this->container['has_conversiontracking'];
    }

    /**
     * Sets has_conversiontracking
     *
     * @param bool $has_conversiontracking uses conversion-tracking tracking or not
     *
     * @return $this
     */
    public function setHasConversiontracking($has_conversiontracking)
    {
        $this->container['has_conversiontracking'] = $has_conversiontracking;

        return $this;
    }

    /**
     * Gets imprint
     *
     * @return string
     */
    public function getImprint()
    {
        return $this->container['imprint'];
    }

    /**
     * Sets imprint
     *
     * @param string $imprint the link to the imprint for this list, which can be used in mailings
     *
     * @return $this
     */
    public function setImprint($imprint)
    {
        if (!is_null($imprint) && (strlen($imprint) > 256)) {
            throw new \InvalidArgumentException('invalid length for $imprint when calling ListGet., must be smaller than or equal to 256.');
        }

        $this->container['imprint'] = $imprint;

        return $this;
    }

    /**
     * Gets header_from_email
     *
     * @return string
     */
    public function getHeaderFromEmail()
    {
        return $this->container['header_from_email'];
    }

    /**
     * Sets header_from_email
     *
     * @param string $header_from_email the email which is used as the from field in a newsletter
     *
     * @return $this
     */
    public function setHeaderFromEmail($header_from_email)
    {
        if (!is_null($header_from_email) && (strlen($header_from_email) > 256)) {
            throw new \InvalidArgumentException('invalid length for $header_from_email when calling ListGet., must be smaller than or equal to 256.');
        }

        $this->container['header_from_email'] = $header_from_email;

        return $this;
    }

    /**
     * Gets header_from_name
     *
     * @return string
     */
    public function getHeaderFromName()
    {
        return $this->container['header_from_name'];
    }

    /**
     * Sets header_from_name
     *
     * @param string $header_from_name the name which is used as the from field in a newsletter
     *
     * @return $this
     */
    public function setHeaderFromName($header_from_name)
    {
        if (!is_null($header_from_name) && (strlen($header_from_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $header_from_name when calling ListGet., must be smaller than or equal to 128.');
        }

        $this->container['header_from_name'] = $header_from_name;

        return $this;
    }

    /**
     * Gets header_reply_email
     *
     * @return string
     */
    public function getHeaderReplyEmail()
    {
        return $this->container['header_reply_email'];
    }

    /**
     * Sets header_reply_email
     *
     * @param string $header_reply_email the email which is used as the reply field in a newsletter
     *
     * @return $this
     */
    public function setHeaderReplyEmail($header_reply_email)
    {
        if (!is_null($header_reply_email) && (strlen($header_reply_email) > 256)) {
            throw new \InvalidArgumentException('invalid length for $header_reply_email when calling ListGet., must be smaller than or equal to 256.');
        }

        $this->container['header_reply_email'] = $header_reply_email;

        return $this;
    }

    /**
     * Gets header_reply_name
     *
     * @return string
     */
    public function getHeaderReplyName()
    {
        return $this->container['header_reply_name'];
    }

    /**
     * Sets header_reply_name
     *
     * @param string $header_reply_name the name which is used as the reply field in a newsletter
     *
     * @return $this
     */
    public function setHeaderReplyName($header_reply_name)
    {
        if (!is_null($header_reply_name) && (strlen($header_reply_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $header_reply_name when calling ListGet., must be smaller than or equal to 128.');
        }

        $this->container['header_reply_name'] = $header_reply_name;

        return $this;
    }

    /**
     * Gets tracking_url
     *
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->container['tracking_url'];
    }

    /**
     * Sets tracking_url
     *
     * @param string $tracking_url a custom tracking url which is used instead of our default one
     *
     * @return $this
     */
    public function setTrackingUrl($tracking_url)
    {
        if (!is_null($tracking_url) && (strlen($tracking_url) > 128)) {
            throw new \InvalidArgumentException('invalid length for $tracking_url when calling ListGet., must be smaller than or equal to 128.');
        }

        $this->container['tracking_url'] = $tracking_url;

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

