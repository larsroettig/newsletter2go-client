<?php
/**
 * NewsletterPost
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
 * NewsletterPost Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class NewsletterPost implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NewsletterPost';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'type' => 'string',
        'name' => 'string',
        'description' => 'string',
        'has_open_tracking' => 'bool',
        'has_click_tracking' => 'bool',
        'has_conversion_tracking' => 'bool',
        'json' => 'string',
        'html' => 'string',
        'text' => 'string',
        'subject' => 'string',
        'preheader' => 'string',
        'header_reply_email' => 'string',
        'header_reply_name' => 'string',
        'header_from_email' => 'string',
        'header_from_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'type' => null,
        'name' => null,
        'description' => null,
        'has_open_tracking' => null,
        'has_click_tracking' => null,
        'has_conversion_tracking' => null,
        'json' => null,
        'html' => null,
        'text' => null,
        'subject' => null,
        'preheader' => null,
        'header_reply_email' => null,
        'header_reply_name' => null,
        'header_from_email' => null,
        'header_from_name' => null
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
        'type' => 'type',
        'name' => 'name',
        'description' => 'description',
        'has_open_tracking' => 'has_open_tracking',
        'has_click_tracking' => 'has_click_tracking',
        'has_conversion_tracking' => 'has_conversion_tracking',
        'json' => 'json',
        'html' => 'html',
        'text' => 'text',
        'subject' => 'subject',
        'preheader' => 'preheader',
        'header_reply_email' => 'header_reply_email',
        'header_reply_name' => 'header_reply_name',
        'header_from_email' => 'header_from_email',
        'header_from_name' => 'header_from_name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'name' => 'setName',
        'description' => 'setDescription',
        'has_open_tracking' => 'setHasOpenTracking',
        'has_click_tracking' => 'setHasClickTracking',
        'has_conversion_tracking' => 'setHasConversionTracking',
        'json' => 'setJson',
        'html' => 'setHtml',
        'text' => 'setText',
        'subject' => 'setSubject',
        'preheader' => 'setPreheader',
        'header_reply_email' => 'setHeaderReplyEmail',
        'header_reply_name' => 'setHeaderReplyName',
        'header_from_email' => 'setHeaderFromEmail',
        'header_from_name' => 'setHeaderFromName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'name' => 'getName',
        'description' => 'getDescription',
        'has_open_tracking' => 'getHasOpenTracking',
        'has_click_tracking' => 'getHasClickTracking',
        'has_conversion_tracking' => 'getHasConversionTracking',
        'json' => 'getJson',
        'html' => 'getHtml',
        'text' => 'getText',
        'subject' => 'getSubject',
        'preheader' => 'getPreheader',
        'header_reply_email' => 'getHeaderReplyEmail',
        'header_reply_name' => 'getHeaderReplyName',
        'header_from_email' => 'getHeaderFromEmail',
        'header_from_name' => 'getHeaderFromName'
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

    const TYPE__DEFAULT = 'default';
    const TYPE_AB = 'ab';
    const TYPE_TRIGGER = 'trigger';
    const TYPE_TRANSACTION = 'transaction';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE__DEFAULT,
            self::TYPE_AB,
            self::TYPE_TRIGGER,
            self::TYPE_TRANSACTION,
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
        $this->container['type'] = isset($data['type']) ? $data['type'] : 'default';
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['has_open_tracking'] = isset($data['has_open_tracking']) ? $data['has_open_tracking'] : null;
        $this->container['has_click_tracking'] = isset($data['has_click_tracking']) ? $data['has_click_tracking'] : null;
        $this->container['has_conversion_tracking'] = isset($data['has_conversion_tracking']) ? $data['has_conversion_tracking'] : null;
        $this->container['json'] = isset($data['json']) ? $data['json'] : null;
        $this->container['html'] = isset($data['html']) ? $data['html'] : null;
        $this->container['text'] = isset($data['text']) ? $data['text'] : null;
        $this->container['subject'] = isset($data['subject']) ? $data['subject'] : null;
        $this->container['preheader'] = isset($data['preheader']) ? $data['preheader'] : null;
        $this->container['header_reply_email'] = isset($data['header_reply_email']) ? $data['header_reply_email'] : null;
        $this->container['header_reply_name'] = isset($data['header_reply_name']) ? $data['header_reply_name'] : null;
        $this->container['header_from_email'] = isset($data['header_from_email']) ? $data['header_from_email'] : null;
        $this->container['header_from_name'] = isset($data['header_from_name']) ? $data['header_from_name'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($this->container['type'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['name']) && (strlen($this->container['name']) > 64)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['description']) && (strlen($this->container['description']) > 128)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 128.";
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

        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($this->container['type'], $allowedValues)) {
            return false;
        }
        if (strlen($this->container['name']) > 64) {
            return false;
        }
        if (strlen($this->container['description']) > 128) {
            return false;
        }
        return true;
    }


    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type the type of newsletter
     *
     * @return $this
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
     * @param string $name a name for the newsletter
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (strlen($name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $name when calling NewsletterPost., must be smaller than or equal to 64.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description a description for the newsletter
     *
     * @return $this
     */
    public function setDescription($description)
    {
        if (!is_null($description) && (strlen($description) > 128)) {
            throw new \InvalidArgumentException('invalid length for $description when calling NewsletterPost., must be smaller than or equal to 128.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets has_open_tracking
     *
     * @return bool
     */
    public function getHasOpenTracking()
    {
        return $this->container['has_open_tracking'];
    }

    /**
     * Sets has_open_tracking
     *
     * @param bool $has_open_tracking weither open_tracking is enabled or not
     *
     * @return $this
     */
    public function setHasOpenTracking($has_open_tracking)
    {
        $this->container['has_open_tracking'] = $has_open_tracking;

        return $this;
    }

    /**
     * Gets has_click_tracking
     *
     * @return bool
     */
    public function getHasClickTracking()
    {
        return $this->container['has_click_tracking'];
    }

    /**
     * Sets has_click_tracking
     *
     * @param bool $has_click_tracking weither click_tracking is enabled or not
     *
     * @return $this
     */
    public function setHasClickTracking($has_click_tracking)
    {
        $this->container['has_click_tracking'] = $has_click_tracking;

        return $this;
    }

    /**
     * Gets has_conversion_tracking
     *
     * @return bool
     */
    public function getHasConversionTracking()
    {
        return $this->container['has_conversion_tracking'];
    }

    /**
     * Sets has_conversion_tracking
     *
     * @param bool $has_conversion_tracking weither click_tracking is enabled or not
     *
     * @return $this
     */
    public function setHasConversionTracking($has_conversion_tracking)
    {
        $this->container['has_conversion_tracking'] = $has_conversion_tracking;

        return $this;
    }

    /**
     * Gets json
     *
     * @return string
     */
    public function getJson()
    {
        return $this->container['json'];
    }

    /**
     * Sets json
     *
     * @param string $json the json-description of the content.
     *
     * @return $this
     */
    public function setJson($json)
    {
        $this->container['json'] = $json;

        return $this;
    }

    /**
     * Gets html
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->container['html'];
    }

    /**
     * Sets html
     *
     * @param string $html the html content of the newsletter. Is needed when json is not submitted. Otherwise html is optional and will override the html generated out of the json.
     *
     * @return $this
     */
    public function setHtml($html)
    {
        $this->container['html'] = $html;

        return $this;
    }

    /**
     * Gets text
     *
     * @return string
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string $text the text content of the newsletter. If submitted, it will overwrite the automatically generated text-version out of json/html
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     *
     * @param string $subject the subject of the newsletter
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets preheader
     *
     * @return string
     */
    public function getPreheader()
    {
        return $this->container['preheader'];
    }

    /**
     * Sets preheader
     *
     * @param string $preheader the preheader of the newsletter
     *
     * @return $this
     */
    public function setPreheader($preheader)
    {
        $this->container['preheader'] = $preheader;

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
     * @param string $header_reply_email the reply email send in the header of the newsletter
     *
     * @return $this
     */
    public function setHeaderReplyEmail($header_reply_email)
    {
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
     * @param string $header_reply_name the reply name send in the header of the newsletter
     *
     * @return $this
     */
    public function setHeaderReplyName($header_reply_name)
    {
        $this->container['header_reply_name'] = $header_reply_name;

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
     * @param string $header_from_email the from email send in the header of the newsletter
     *
     * @return $this
     */
    public function setHeaderFromEmail($header_from_email)
    {
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
     * @param string $header_from_name the from name send in the header of the newsletter
     *
     * @return $this
     */
    public function setHeaderFromName($header_from_name)
    {
        $this->container['header_from_name'] = $header_from_name;

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

