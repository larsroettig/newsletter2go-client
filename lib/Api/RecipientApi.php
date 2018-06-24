<?php
/**
 * RecipientApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
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

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * RecipientApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RecipientApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation addRecipientToGroup
     *
     * add single recipient to group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function addRecipientToGroup($lid, $gid, $id)
    {
        list($response) = $this->addRecipientToGroupWithHttpInfo($lid, $gid, $id);
        return $response;
    }

    /**
     * Operation addRecipientToGroupWithHttpInfo
     *
     * add single recipient to group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function addRecipientToGroupWithHttpInfo($lid, $gid, $id)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->addRecipientToGroupRequest($lid, $gid, $id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation addRecipientToGroupAsync
     *
     * add single recipient to group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addRecipientToGroupAsync($lid, $gid, $id)
    {
        return $this->addRecipientToGroupAsyncWithHttpInfo($lid, $gid, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addRecipientToGroupAsyncWithHttpInfo
     *
     * add single recipient to group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addRecipientToGroupAsyncWithHttpInfo($lid, $gid, $id)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->addRecipientToGroupRequest($lid, $gid, $id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'addRecipientToGroup'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function addRecipientToGroupRequest($lid, $gid, $id)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling addRecipientToGroup'
            );
        }
        // verify the required parameter 'gid' is set
        if ($gid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $gid when calling addRecipientToGroup'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling addRecipientToGroup'
            );
        }

        $resourcePath = '/lists/{lid}/groups/{gid}/recipients/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($gid !== null) {
            $resourcePath = str_replace(
                '{' . 'gid' . '}',
                ObjectSerializer::toPathValue($gid),
                $resourcePath
            );
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation addRecipientsToGroup
     *
     * add all Recipients to the given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function addRecipientsToGroup($lid, $gid, $_filter = null)
    {
        list($response) = $this->addRecipientsToGroupWithHttpInfo($lid, $gid, $_filter);
        return $response;
    }

    /**
     * Operation addRecipientsToGroupWithHttpInfo
     *
     * add all Recipients to the given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function addRecipientsToGroupWithHttpInfo($lid, $gid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->addRecipientsToGroupRequest($lid, $gid, $_filter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation addRecipientsToGroupAsync
     *
     * add all Recipients to the given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addRecipientsToGroupAsync($lid, $gid, $_filter = null)
    {
        return $this->addRecipientsToGroupAsyncWithHttpInfo($lid, $gid, $_filter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addRecipientsToGroupAsyncWithHttpInfo
     *
     * add all Recipients to the given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addRecipientsToGroupAsyncWithHttpInfo($lid, $gid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->addRecipientsToGroupRequest($lid, $gid, $_filter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'addRecipientsToGroup'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function addRecipientsToGroupRequest($lid, $gid, $_filter = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling addRecipientsToGroup'
            );
        }
        // verify the required parameter 'gid' is set
        if ($gid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $gid when calling addRecipientsToGroup'
            );
        }

        $resourcePath = '/lists/{lid}/groups/{gid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($gid !== null) {
            $resourcePath = str_replace(
                '{' . 'gid' . '}',
                ObjectSerializer::toPathValue($gid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createRecipient
     *
     * create new recipient(s) or updates existing ones
     *
     * @param  \Swagger\Client\Model\RecipientPost $recipient the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApiResponsePost
     */
    public function createRecipient($recipient)
    {
        list($response) = $this->createRecipientWithHttpInfo($recipient);
        return $response;
    }

    /**
     * Operation createRecipientWithHttpInfo
     *
     * create new recipient(s) or updates existing ones
     *
     * @param  \Swagger\Client\Model\RecipientPost $recipient the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApiResponsePost, HTTP status code, HTTP response headers (array of strings)
     */
    public function createRecipientWithHttpInfo($recipient)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->createRecipientRequest($recipient);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApiResponsePost',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createRecipientAsync
     *
     * create new recipient(s) or updates existing ones
     *
     * @param  \Swagger\Client\Model\RecipientPost $recipient the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createRecipientAsync($recipient)
    {
        return $this->createRecipientAsyncWithHttpInfo($recipient)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createRecipientAsyncWithHttpInfo
     *
     * create new recipient(s) or updates existing ones
     *
     * @param  \Swagger\Client\Model\RecipientPost $recipient the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createRecipientAsyncWithHttpInfo($recipient)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->createRecipientRequest($recipient);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createRecipient'
     *
     * @param  \Swagger\Client\Model\RecipientPost $recipient the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createRecipientRequest($recipient)
    {
        // verify the required parameter 'recipient' is set
        if ($recipient === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recipient when calling createRecipient'
            );
        }

        $resourcePath = '/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($recipient)) {
            $_tempBody = $recipient;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteRecipient
     *
     * delete the recipient
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApiResponseDelete
     */
    public function deleteRecipient($lid, $id)
    {
        list($response) = $this->deleteRecipientWithHttpInfo($lid, $id);
        return $response;
    }

    /**
     * Operation deleteRecipientWithHttpInfo
     *
     * delete the recipient
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApiResponseDelete, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteRecipientWithHttpInfo($lid, $id)
    {
        $returnType = '\Swagger\Client\Model\ApiResponseDelete';
        $request = $this->deleteRecipientRequest($lid, $id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApiResponseDelete',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteRecipientAsync
     *
     * delete the recipient
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteRecipientAsync($lid, $id)
    {
        return $this->deleteRecipientAsyncWithHttpInfo($lid, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteRecipientAsyncWithHttpInfo
     *
     * delete the recipient
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteRecipientAsyncWithHttpInfo($lid, $id)
    {
        $returnType = '\Swagger\Client\Model\ApiResponseDelete';
        $request = $this->deleteRecipientRequest($lid, $id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteRecipient'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteRecipientRequest($lid, $id)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling deleteRecipient'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteRecipient'
            );
        }

        $resourcePath = '/lists/{lid}/recipients/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRecipients
     *
     * get all Recipients of selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\RecipientResponse
     */
    public function getRecipients($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        list($response) = $this->getRecipientsWithHttpInfo($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
        return $response;
    }

    /**
     * Operation getRecipientsWithHttpInfo
     *
     * get all Recipients of selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\RecipientResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRecipientsWithHttpInfo($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\RecipientResponse';
        $request = $this->getRecipientsRequest($lid, $_filter, $_limit, $_offset, $_expand, $_fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\RecipientResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRecipientsAsync
     *
     * get all Recipients of selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRecipientsAsync($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        return $this->getRecipientsAsyncWithHttpInfo($lid, $_filter, $_limit, $_offset, $_expand, $_fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRecipientsAsyncWithHttpInfo
     *
     * get all Recipients of selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRecipientsAsyncWithHttpInfo($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\RecipientResponse';
        $request = $this->getRecipientsRequest($lid, $_filter, $_limit, $_offset, $_expand, $_fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getRecipients'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getRecipientsRequest($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling getRecipients'
            );
        }

        $resourcePath = '/lists/{lid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }
        // query params
        if ($_limit !== null) {
            $queryParams['_limit'] = ObjectSerializer::toQueryValue($_limit);
        }
        // query params
        if ($_offset !== null) {
            $queryParams['_offset'] = ObjectSerializer::toQueryValue($_offset);
        }
        // query params
        if ($_expand !== null) {
            $queryParams['_expand'] = ObjectSerializer::toQueryValue($_expand);
        }
        // query params
        if (is_array($_fields)) {
            $_fields = ObjectSerializer::serializeCollection($_fields, 'csv', true);
        }
        if ($_fields !== null) {
            $queryParams['_fields'] = ObjectSerializer::toQueryValue($_fields);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRecipientsByGroup
     *
     * get all Recipients of selected group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\RecipientResponse
     */
    public function getRecipientsByGroup($lid, $gid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        list($response) = $this->getRecipientsByGroupWithHttpInfo($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields);
        return $response;
    }

    /**
     * Operation getRecipientsByGroupWithHttpInfo
     *
     * get all Recipients of selected group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\RecipientResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRecipientsByGroupWithHttpInfo($lid, $gid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\RecipientResponse';
        $request = $this->getRecipientsByGroupRequest($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\RecipientResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRecipientsByGroupAsync
     *
     * get all Recipients of selected group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRecipientsByGroupAsync($lid, $gid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        return $this->getRecipientsByGroupAsyncWithHttpInfo($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRecipientsByGroupAsyncWithHttpInfo
     *
     * get all Recipients of selected group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRecipientsByGroupAsyncWithHttpInfo($lid, $gid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\RecipientResponse';
        $request = $this->getRecipientsByGroupRequest($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getRecipientsByGroup'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getRecipientsByGroupRequest($lid, $gid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling getRecipientsByGroup'
            );
        }
        // verify the required parameter 'gid' is set
        if ($gid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $gid when calling getRecipientsByGroup'
            );
        }

        $resourcePath = '/lists/{lid}/groups/{gid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }
        // query params
        if ($_limit !== null) {
            $queryParams['_limit'] = ObjectSerializer::toQueryValue($_limit);
        }
        // query params
        if ($_offset !== null) {
            $queryParams['_offset'] = ObjectSerializer::toQueryValue($_offset);
        }
        // query params
        if ($_expand !== null) {
            $queryParams['_expand'] = ObjectSerializer::toQueryValue($_expand);
        }
        // query params
        if (is_array($_fields)) {
            $_fields = ObjectSerializer::serializeCollection($_fields, 'csv', true);
        }
        if ($_fields !== null) {
            $queryParams['_fields'] = ObjectSerializer::toQueryValue($_fields);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($gid !== null) {
            $resourcePath = str_replace(
                '{' . 'gid' . '}',
                ObjectSerializer::toPathValue($gid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation importRecipientsInit
     *
     * Initialize the import of recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \SplFileObject $file recipient file to upload (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse200
     */
    public function importRecipientsInit($lid, $file)
    {
        list($response) = $this->importRecipientsInitWithHttpInfo($lid, $file);
        return $response;
    }

    /**
     * Operation importRecipientsInitWithHttpInfo
     *
     * Initialize the import of recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \SplFileObject $file recipient file to upload (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     */
    public function importRecipientsInitWithHttpInfo($lid, $file)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->importRecipientsInitRequest($lid, $file);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse200',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation importRecipientsInitAsync
     *
     * Initialize the import of recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \SplFileObject $file recipient file to upload (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsInitAsync($lid, $file)
    {
        return $this->importRecipientsInitAsyncWithHttpInfo($lid, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importRecipientsInitAsyncWithHttpInfo
     *
     * Initialize the import of recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \SplFileObject $file recipient file to upload (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsInitAsyncWithHttpInfo($lid, $file)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->importRecipientsInitRequest($lid, $file);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importRecipientsInit'
     *
     * @param  string $lid the id of the list (required)
     * @param  \SplFileObject $file recipient file to upload (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function importRecipientsInitRequest($lid, $file)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling importRecipientsInit'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling importRecipientsInit'
            );
        }

        $resourcePath = '/lists/{lid}/recipients/import/init';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation importRecipientsSave
     *
     * Start the import recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\Data $data the data to start the import (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApiResponsePost
     */
    public function importRecipientsSave($lid, $data)
    {
        list($response) = $this->importRecipientsSaveWithHttpInfo($lid, $data);
        return $response;
    }

    /**
     * Operation importRecipientsSaveWithHttpInfo
     *
     * Start the import recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\Data $data the data to start the import (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApiResponsePost, HTTP status code, HTTP response headers (array of strings)
     */
    public function importRecipientsSaveWithHttpInfo($lid, $data)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->importRecipientsSaveRequest($lid, $data);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ApiResponsePost',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation importRecipientsSaveAsync
     *
     * Start the import recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\Data $data the data to start the import (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsSaveAsync($lid, $data)
    {
        return $this->importRecipientsSaveAsyncWithHttpInfo($lid, $data)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importRecipientsSaveAsyncWithHttpInfo
     *
     * Start the import recipients by file
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\Data $data the data to start the import (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsSaveAsyncWithHttpInfo($lid, $data)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->importRecipientsSaveRequest($lid, $data);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importRecipientsSave'
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\Data $data the data to start the import (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function importRecipientsSaveRequest($lid, $data)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling importRecipientsSave'
            );
        }
        // verify the required parameter 'data' is set
        if ($data === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data when calling importRecipientsSave'
            );
        }

        $resourcePath = '/lists/{lid}/recipients/import/save';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($data)) {
            $_tempBody = $data;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation importRecipientsStatistics
     *
     * Get statistics about the import by file
     *
     * @param  string $id the id of the import job (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ImportResponse
     */
    public function importRecipientsStatistics($id)
    {
        list($response) = $this->importRecipientsStatisticsWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation importRecipientsStatisticsWithHttpInfo
     *
     * Get statistics about the import by file
     *
     * @param  string $id the id of the import job (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ImportResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function importRecipientsStatisticsWithHttpInfo($id)
    {
        $returnType = '\Swagger\Client\Model\ImportResponse';
        $request = $this->importRecipientsStatisticsRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ImportResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation importRecipientsStatisticsAsync
     *
     * Get statistics about the import by file
     *
     * @param  string $id the id of the import job (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsStatisticsAsync($id)
    {
        return $this->importRecipientsStatisticsAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importRecipientsStatisticsAsyncWithHttpInfo
     *
     * Get statistics about the import by file
     *
     * @param  string $id the id of the import job (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importRecipientsStatisticsAsyncWithHttpInfo($id)
    {
        $returnType = '\Swagger\Client\Model\ImportResponse';
        $request = $this->importRecipientsStatisticsRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importRecipientsStatistics'
     *
     * @param  string $id the id of the import job (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function importRecipientsStatisticsRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling importRecipientsStatistics'
            );
        }

        $resourcePath = '/import/{id}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeRecipientFromGroup
     *
     * remove single recipient from group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function removeRecipientFromGroup($lid, $gid, $id)
    {
        list($response) = $this->removeRecipientFromGroupWithHttpInfo($lid, $gid, $id);
        return $response;
    }

    /**
     * Operation removeRecipientFromGroupWithHttpInfo
     *
     * remove single recipient from group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeRecipientFromGroupWithHttpInfo($lid, $gid, $id)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientFromGroupRequest($lid, $gid, $id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation removeRecipientFromGroupAsync
     *
     * remove single recipient from group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientFromGroupAsync($lid, $gid, $id)
    {
        return $this->removeRecipientFromGroupAsyncWithHttpInfo($lid, $gid, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeRecipientFromGroupAsyncWithHttpInfo
     *
     * remove single recipient from group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientFromGroupAsyncWithHttpInfo($lid, $gid, $id)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientFromGroupRequest($lid, $gid, $id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'removeRecipientFromGroup'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $id the id of the recipient (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function removeRecipientFromGroupRequest($lid, $gid, $id)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling removeRecipientFromGroup'
            );
        }
        // verify the required parameter 'gid' is set
        if ($gid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $gid when calling removeRecipientFromGroup'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling removeRecipientFromGroup'
            );
        }

        $resourcePath = '/lists/{lid}/groups/{gid}/recipients/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($gid !== null) {
            $resourcePath = str_replace(
                '{' . 'gid' . '}',
                ObjectSerializer::toPathValue($gid),
                $resourcePath
            );
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeRecipientsFromGroup
     *
     * remove all Recipients from given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function removeRecipientsFromGroup($lid, $gid, $_filter = null)
    {
        list($response) = $this->removeRecipientsFromGroupWithHttpInfo($lid, $gid, $_filter);
        return $response;
    }

    /**
     * Operation removeRecipientsFromGroupWithHttpInfo
     *
     * remove all Recipients from given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeRecipientsFromGroupWithHttpInfo($lid, $gid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientsFromGroupRequest($lid, $gid, $_filter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation removeRecipientsFromGroupAsync
     *
     * remove all Recipients from given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientsFromGroupAsync($lid, $gid, $_filter = null)
    {
        return $this->removeRecipientsFromGroupAsyncWithHttpInfo($lid, $gid, $_filter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeRecipientsFromGroupAsyncWithHttpInfo
     *
     * remove all Recipients from given group
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientsFromGroupAsyncWithHttpInfo($lid, $gid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientsFromGroupRequest($lid, $gid, $_filter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'removeRecipientsFromGroup'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $gid the id of the group (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function removeRecipientsFromGroupRequest($lid, $gid, $_filter = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling removeRecipientsFromGroup'
            );
        }
        // verify the required parameter 'gid' is set
        if ($gid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $gid when calling removeRecipientsFromGroup'
            );
        }

        $resourcePath = '/lists/{lid}/groups/{gid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($gid !== null) {
            $resourcePath = str_replace(
                '{' . 'gid' . '}',
                ObjectSerializer::toPathValue($gid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeRecipientsFromList
     *
     * remove all Recipients from selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function removeRecipientsFromList($lid, $_filter = null)
    {
        list($response) = $this->removeRecipientsFromListWithHttpInfo($lid, $_filter);
        return $response;
    }

    /**
     * Operation removeRecipientsFromListWithHttpInfo
     *
     * remove all Recipients from selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeRecipientsFromListWithHttpInfo($lid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientsFromListRequest($lid, $_filter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation removeRecipientsFromListAsync
     *
     * remove all Recipients from selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientsFromListAsync($lid, $_filter = null)
    {
        return $this->removeRecipientsFromListAsyncWithHttpInfo($lid, $_filter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeRecipientsFromListAsyncWithHttpInfo
     *
     * remove all Recipients from selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeRecipientsFromListAsyncWithHttpInfo($lid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->removeRecipientsFromListRequest($lid, $_filter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'removeRecipientsFromList'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function removeRecipientsFromListRequest($lid, $_filter = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling removeRecipientsFromList'
            );
        }

        $resourcePath = '/lists/{lid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation subscribeRecipient
     *
     * Creates a new recipient and sends a DOI-Mail
     *
     * @param  string $code the subscribe-code displayed when creating a subscribe-form (required)
     * @param  \Swagger\Client\Model\RecipientSubscribe $recipient the recipient to subscribe (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\RecipientSubscribeResponse
     */
    public function subscribeRecipient($code, $recipient)
    {
        list($response) = $this->subscribeRecipientWithHttpInfo($code, $recipient);
        return $response;
    }

    /**
     * Operation subscribeRecipientWithHttpInfo
     *
     * Creates a new recipient and sends a DOI-Mail
     *
     * @param  string $code the subscribe-code displayed when creating a subscribe-form (required)
     * @param  \Swagger\Client\Model\RecipientSubscribe $recipient the recipient to subscribe (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\RecipientSubscribeResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscribeRecipientWithHttpInfo($code, $recipient)
    {
        $returnType = '\Swagger\Client\Model\RecipientSubscribeResponse';
        $request = $this->subscribeRecipientRequest($code, $recipient);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\RecipientSubscribeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation subscribeRecipientAsync
     *
     * Creates a new recipient and sends a DOI-Mail
     *
     * @param  string $code the subscribe-code displayed when creating a subscribe-form (required)
     * @param  \Swagger\Client\Model\RecipientSubscribe $recipient the recipient to subscribe (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscribeRecipientAsync($code, $recipient)
    {
        return $this->subscribeRecipientAsyncWithHttpInfo($code, $recipient)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscribeRecipientAsyncWithHttpInfo
     *
     * Creates a new recipient and sends a DOI-Mail
     *
     * @param  string $code the subscribe-code displayed when creating a subscribe-form (required)
     * @param  \Swagger\Client\Model\RecipientSubscribe $recipient the recipient to subscribe (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscribeRecipientAsyncWithHttpInfo($code, $recipient)
    {
        $returnType = '\Swagger\Client\Model\RecipientSubscribeResponse';
        $request = $this->subscribeRecipientRequest($code, $recipient);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'subscribeRecipient'
     *
     * @param  string $code the subscribe-code displayed when creating a subscribe-form (required)
     * @param  \Swagger\Client\Model\RecipientSubscribe $recipient the recipient to subscribe (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function subscribeRecipientRequest($code, $recipient)
    {
        // verify the required parameter 'code' is set
        if ($code === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $code when calling subscribeRecipient'
            );
        }
        // verify the required parameter 'recipient' is set
        if ($recipient === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recipient when calling subscribeRecipient'
            );
        }

        $resourcePath = '/forms/submit/{code}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($code !== null) {
            $resourcePath = str_replace(
                '{' . 'code' . '}',
                ObjectSerializer::toPathValue($code),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($recipient)) {
            $_tempBody = $recipient;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateRecipient
     *
     * update the recipient.
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     * @param  \Swagger\Client\Model\RecipientPatch $recipient the data to update (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function updateRecipient($lid, $id, $recipient)
    {
        list($response) = $this->updateRecipientWithHttpInfo($lid, $id, $recipient);
        return $response;
    }

    /**
     * Operation updateRecipientWithHttpInfo
     *
     * update the recipient.
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     * @param  \Swagger\Client\Model\RecipientPatch $recipient the data to update (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateRecipientWithHttpInfo($lid, $id, $recipient)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateRecipientRequest($lid, $id, $recipient);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateRecipientAsync
     *
     * update the recipient.
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     * @param  \Swagger\Client\Model\RecipientPatch $recipient the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateRecipientAsync($lid, $id, $recipient)
    {
        return $this->updateRecipientAsyncWithHttpInfo($lid, $id, $recipient)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateRecipientAsyncWithHttpInfo
     *
     * update the recipient.
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     * @param  \Swagger\Client\Model\RecipientPatch $recipient the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateRecipientAsyncWithHttpInfo($lid, $id, $recipient)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateRecipientRequest($lid, $id, $recipient);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateRecipient'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $id the id of the recipient (required)
     * @param  \Swagger\Client\Model\RecipientPatch $recipient the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateRecipientRequest($lid, $id, $recipient)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling updateRecipient'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling updateRecipient'
            );
        }
        // verify the required parameter 'recipient' is set
        if ($recipient === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recipient when calling updateRecipient'
            );
        }

        $resourcePath = '/lists/{lid}/recipients/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($recipient)) {
            $_tempBody = $recipient;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateRecipients
     *
     * update all Recipients in selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function updateRecipients($lid, $_filter = null)
    {
        list($response) = $this->updateRecipientsWithHttpInfo($lid, $_filter);
        return $response;
    }

    /**
     * Operation updateRecipientsWithHttpInfo
     *
     * update all Recipients in selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateRecipientsWithHttpInfo($lid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateRecipientsRequest($lid, $_filter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PatchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateRecipientsAsync
     *
     * update all Recipients in selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateRecipientsAsync($lid, $_filter = null)
    {
        return $this->updateRecipientsAsyncWithHttpInfo($lid, $_filter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateRecipientsAsyncWithHttpInfo
     *
     * update all Recipients in selected list
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateRecipientsAsyncWithHttpInfo($lid, $_filter = null)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateRecipientsRequest($lid, $_filter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateRecipients'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $_filter a FIQL-Filter (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateRecipientsRequest($lid, $_filter = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling updateRecipients'
            );
        }

        $resourcePath = '/lists/{lid}/recipients';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($_filter !== null) {
            $queryParams['_filter'] = ObjectSerializer::toQueryValue($_filter);
        }

        // path params
        if ($lid !== null) {
            $resourcePath = str_replace(
                '{' . 'lid' . '}',
                ObjectSerializer::toPathValue($lid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
