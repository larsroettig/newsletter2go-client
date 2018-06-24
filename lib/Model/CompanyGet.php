<?php
/**
 * CompanyGet
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
 * CompanyGet Class Doc Comment
 *
 * @category Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class CompanyGet implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CompanyGet';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'name' => 'string',
        'address' => 'string',
        'city' => 'string',
        'postcode' => 'string',
        'country' => 'string',
        'bill_name' => 'string',
        'bill_first_name' => 'string',
        'bill_last_name' => 'string',
        'bill_address' => 'string',
        'bill_city' => 'string',
        'bill_postcode' => 'string',
        'bill_country' => 'string',
        'default_list_id' => 'string',
        'state' => 'string',
        'credits_email' => 'int',
        'credits_freemail' => 'int',
        'credits_abo' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'name' => null,
        'address' => null,
        'city' => null,
        'postcode' => null,
        'country' => null,
        'bill_name' => null,
        'bill_first_name' => null,
        'bill_last_name' => null,
        'bill_address' => null,
        'bill_city' => null,
        'bill_postcode' => null,
        'bill_country' => null,
        'default_list_id' => null,
        'state' => null,
        'credits_email' => null,
        'credits_freemail' => null,
        'credits_abo' => null
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
        'address' => 'address',
        'city' => 'city',
        'postcode' => 'postcode',
        'country' => 'country',
        'bill_name' => 'bill_name',
        'bill_first_name' => 'bill_first_name',
        'bill_last_name' => 'bill_last_name',
        'bill_address' => 'bill_address',
        'bill_city' => 'bill_city',
        'bill_postcode' => 'bill_postcode',
        'bill_country' => 'bill_country',
        'default_list_id' => 'default_list_id',
        'state' => 'state',
        'credits_email' => 'credits_email',
        'credits_freemail' => 'credits_freemail',
        'credits_abo' => 'credits_abo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'address' => 'setAddress',
        'city' => 'setCity',
        'postcode' => 'setPostcode',
        'country' => 'setCountry',
        'bill_name' => 'setBillName',
        'bill_first_name' => 'setBillFirstName',
        'bill_last_name' => 'setBillLastName',
        'bill_address' => 'setBillAddress',
        'bill_city' => 'setBillCity',
        'bill_postcode' => 'setBillPostcode',
        'bill_country' => 'setBillCountry',
        'default_list_id' => 'setDefaultListId',
        'state' => 'setState',
        'credits_email' => 'setCreditsEmail',
        'credits_freemail' => 'setCreditsFreemail',
        'credits_abo' => 'setCreditsAbo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'address' => 'getAddress',
        'city' => 'getCity',
        'postcode' => 'getPostcode',
        'country' => 'getCountry',
        'bill_name' => 'getBillName',
        'bill_first_name' => 'getBillFirstName',
        'bill_last_name' => 'getBillLastName',
        'bill_address' => 'getBillAddress',
        'bill_city' => 'getBillCity',
        'bill_postcode' => 'getBillPostcode',
        'bill_country' => 'getBillCountry',
        'default_list_id' => 'getDefaultListId',
        'state' => 'getState',
        'credits_email' => 'getCreditsEmail',
        'credits_freemail' => 'getCreditsFreemail',
        'credits_abo' => 'getCreditsAbo'
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

    const STATE_VERIFIED = 'verified';
    const STATE_PENDING = 'pending';
    const STATE_DECLIDED = 'declided';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStateAllowableValues()
    {
        return [
            self::STATE_VERIFIED,
            self::STATE_PENDING,
            self::STATE_DECLIDED,
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['postcode'] = isset($data['postcode']) ? $data['postcode'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['bill_name'] = isset($data['bill_name']) ? $data['bill_name'] : null;
        $this->container['bill_first_name'] = isset($data['bill_first_name']) ? $data['bill_first_name'] : null;
        $this->container['bill_last_name'] = isset($data['bill_last_name']) ? $data['bill_last_name'] : null;
        $this->container['bill_address'] = isset($data['bill_address']) ? $data['bill_address'] : null;
        $this->container['bill_city'] = isset($data['bill_city']) ? $data['bill_city'] : null;
        $this->container['bill_postcode'] = isset($data['bill_postcode']) ? $data['bill_postcode'] : null;
        $this->container['bill_country'] = isset($data['bill_country']) ? $data['bill_country'] : null;
        $this->container['default_list_id'] = isset($data['default_list_id']) ? $data['default_list_id'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['credits_email'] = isset($data['credits_email']) ? $data['credits_email'] : null;
        $this->container['credits_freemail'] = isset($data['credits_freemail']) ? $data['credits_freemail'] : null;
        $this->container['credits_abo'] = isset($data['credits_abo']) ? $data['credits_abo'] : null;
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

        if (!is_null($this->container['bill_name']) && (strlen($this->container['bill_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'bill_name', the character length must be smaller than or equal to 64.";
        }

        $allowedValues = $this->getStateAllowableValues();
        if (!in_array($this->container['state'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'state', must be one of '%s'",
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

        if (strlen($this->container['name']) > 64) {
            return false;
        }
        if (strlen($this->container['bill_name']) > 64) {
            return false;
        }
        $allowedValues = $this->getStateAllowableValues();
        if (!in_array($this->container['state'], $allowedValues)) {
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
     * @param string $id the id of the company
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
     * @param string $name name of the company
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (strlen($name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $name when calling CompanyGet., must be smaller than or equal to 64.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address the address of the company
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city the city of the company
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->container['postcode'];
    }

    /**
     * Sets postcode
     *
     * @param string $postcode the city of the company
     *
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->container['postcode'] = $postcode;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country the ISO 3166-1 alpha-2 country code of the company
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets bill_name
     *
     * @return string
     */
    public function getBillName()
    {
        return $this->container['bill_name'];
    }

    /**
     * Sets bill_name
     *
     * @param string $bill_name name of the company for bills
     *
     * @return $this
     */
    public function setBillName($bill_name)
    {
        if (!is_null($bill_name) && (strlen($bill_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $bill_name when calling CompanyGet., must be smaller than or equal to 64.');
        }

        $this->container['bill_name'] = $bill_name;

        return $this;
    }

    /**
     * Gets bill_first_name
     *
     * @return string
     */
    public function getBillFirstName()
    {
        return $this->container['bill_first_name'];
    }

    /**
     * Sets bill_first_name
     *
     * @param string $bill_first_name first name of the contact person of the company for bills
     *
     * @return $this
     */
    public function setBillFirstName($bill_first_name)
    {
        $this->container['bill_first_name'] = $bill_first_name;

        return $this;
    }

    /**
     * Gets bill_last_name
     *
     * @return string
     */
    public function getBillLastName()
    {
        return $this->container['bill_last_name'];
    }

    /**
     * Sets bill_last_name
     *
     * @param string $bill_last_name last name of the contact person of the company for bills
     *
     * @return $this
     */
    public function setBillLastName($bill_last_name)
    {
        $this->container['bill_last_name'] = $bill_last_name;

        return $this;
    }

    /**
     * Gets bill_address
     *
     * @return string
     */
    public function getBillAddress()
    {
        return $this->container['bill_address'];
    }

    /**
     * Sets bill_address
     *
     * @param string $bill_address the address of the company for bills
     *
     * @return $this
     */
    public function setBillAddress($bill_address)
    {
        $this->container['bill_address'] = $bill_address;

        return $this;
    }

    /**
     * Gets bill_city
     *
     * @return string
     */
    public function getBillCity()
    {
        return $this->container['bill_city'];
    }

    /**
     * Sets bill_city
     *
     * @param string $bill_city the city of the company for bills
     *
     * @return $this
     */
    public function setBillCity($bill_city)
    {
        $this->container['bill_city'] = $bill_city;

        return $this;
    }

    /**
     * Gets bill_postcode
     *
     * @return string
     */
    public function getBillPostcode()
    {
        return $this->container['bill_postcode'];
    }

    /**
     * Sets bill_postcode
     *
     * @param string $bill_postcode the city of the company for bills
     *
     * @return $this
     */
    public function setBillPostcode($bill_postcode)
    {
        $this->container['bill_postcode'] = $bill_postcode;

        return $this;
    }

    /**
     * Gets bill_country
     *
     * @return string
     */
    public function getBillCountry()
    {
        return $this->container['bill_country'];
    }

    /**
     * Sets bill_country
     *
     * @param string $bill_country the ISO 3166-1 alpha-2 country code of the company for bills
     *
     * @return $this
     */
    public function setBillCountry($bill_country)
    {
        $this->container['bill_country'] = $bill_country;

        return $this;
    }

    /**
     * Gets default_list_id
     *
     * @return string
     */
    public function getDefaultListId()
    {
        return $this->container['default_list_id'];
    }

    /**
     * Sets default_list_id
     *
     * @param string $default_list_id the id of the list which should be used as default
     *
     * @return $this
     */
    public function setDefaultListId($default_list_id)
    {
        $this->container['default_list_id'] = $default_list_id;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string $state the state of the company (allowed to send or not)
     *
     * @return $this
     */
    public function setState($state)
    {
        $allowedValues = $this->getStateAllowableValues();
        if (!is_null($state) && !in_array($state, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'state', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets credits_email
     *
     * @return int
     */
    public function getCreditsEmail()
    {
        return $this->container['credits_email'];
    }

    /**
     * Sets credits_email
     *
     * @param int $credits_email the amount of prepaid credits
     *
     * @return $this
     */
    public function setCreditsEmail($credits_email)
    {
        $this->container['credits_email'] = $credits_email;

        return $this;
    }

    /**
     * Gets credits_freemail
     *
     * @return int
     */
    public function getCreditsFreemail()
    {
        return $this->container['credits_freemail'];
    }

    /**
     * Sets credits_freemail
     *
     * @param int $credits_freemail the number of free credits
     *
     * @return $this
     */
    public function setCreditsFreemail($credits_freemail)
    {
        $this->container['credits_freemail'] = $credits_freemail;

        return $this;
    }

    /**
     * Gets credits_abo
     *
     * @return int
     */
    public function getCreditsAbo()
    {
        return $this->container['credits_abo'];
    }

    /**
     * Sets credits_abo
     *
     * @param int $credits_abo the number of abo credits
     *
     * @return $this
     */
    public function setCreditsAbo($credits_abo)
    {
        $this->container['credits_abo'] = $credits_abo;

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

