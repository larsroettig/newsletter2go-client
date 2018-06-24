<?php
/**
 * NewsletterApi
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
 * NewsletterApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class NewsletterApi
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
     * Operation createNewsletter
     *
     * creates a new newsletter
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApiResponsePost
     */
    public function createNewsletter($lid, $newsletter)
    {
        list($response) = $this->createNewsletterWithHttpInfo($lid, $newsletter);
        return $response;
    }

    /**
     * Operation createNewsletterWithHttpInfo
     *
     * creates a new newsletter
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApiResponsePost, HTTP status code, HTTP response headers (array of strings)
     */
    public function createNewsletterWithHttpInfo($lid, $newsletter)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->createNewsletterRequest($lid, $newsletter);

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
     * Operation createNewsletterAsync
     *
     * creates a new newsletter
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createNewsletterAsync($lid, $newsletter)
    {
        return $this->createNewsletterAsyncWithHttpInfo($lid, $newsletter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createNewsletterAsyncWithHttpInfo
     *
     * creates a new newsletter
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createNewsletterAsyncWithHttpInfo($lid, $newsletter)
    {
        $returnType = '\Swagger\Client\Model\ApiResponsePost';
        $request = $this->createNewsletterRequest($lid, $newsletter);

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
     * Create request for operation 'createNewsletter'
     *
     * @param  string $lid the id of the list (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createNewsletterRequest($lid, $newsletter)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling createNewsletter'
            );
        }
        // verify the required parameter 'newsletter' is set
        if ($newsletter === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $newsletter when calling createNewsletter'
            );
        }

        $resourcePath = '/lists/{lid}/newsletters';
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
        if (isset($newsletter)) {
            $_tempBody = $newsletter;
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
     * Operation getNewsletter
     *
     * get one newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\NewsletterResponse
     */
    public function getNewsletter($id, $_filter = null, $_fields = null)
    {
        list($response) = $this->getNewsletterWithHttpInfo($id, $_filter, $_fields);
        return $response;
    }

    /**
     * Operation getNewsletterWithHttpInfo
     *
     * get one newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\NewsletterResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getNewsletterWithHttpInfo($id, $_filter = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\NewsletterResponse';
        $request = $this->getNewsletterRequest($id, $_filter, $_fields);

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
                        '\Swagger\Client\Model\NewsletterResponse',
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
     * Operation getNewsletterAsync
     *
     * get one newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNewsletterAsync($id, $_filter = null, $_fields = null)
    {
        return $this->getNewsletterAsyncWithHttpInfo($id, $_filter, $_fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getNewsletterAsyncWithHttpInfo
     *
     * get one newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNewsletterAsyncWithHttpInfo($id, $_filter = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\NewsletterResponse';
        $request = $this->getNewsletterRequest($id, $_filter, $_fields);

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
     * Create request for operation 'getNewsletter'
     *
     * @param  string $id the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getNewsletterRequest($id, $_filter = null, $_fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getNewsletter'
            );
        }

        $resourcePath = '/newsletters/{id}';
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
        if (is_array($_fields)) {
            $_fields = ObjectSerializer::serializeCollection($_fields, 'csv', true);
        }
        if ($_fields !== null) {
            $queryParams['_fields'] = ObjectSerializer::toQueryValue($_fields);
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getNewsletters
     *
     * get all newsletters of the given list
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
     * @return \Swagger\Client\Model\NewsletterResponse
     */
    public function getNewsletters($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        list($response) = $this->getNewslettersWithHttpInfo($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
        return $response;
    }

    /**
     * Operation getNewslettersWithHttpInfo
     *
     * get all newsletters of the given list
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
     * @return array of \Swagger\Client\Model\NewsletterResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getNewslettersWithHttpInfo($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\NewsletterResponse';
        $request = $this->getNewslettersRequest($lid, $_filter, $_limit, $_offset, $_expand, $_fields);

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
                        '\Swagger\Client\Model\NewsletterResponse',
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
     * Operation getNewslettersAsync
     *
     * get all newsletters of the given list
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
    public function getNewslettersAsync($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        return $this->getNewslettersAsyncWithHttpInfo($lid, $_filter, $_limit, $_offset, $_expand, $_fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getNewslettersAsyncWithHttpInfo
     *
     * get all newsletters of the given list
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
    public function getNewslettersAsyncWithHttpInfo($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\NewsletterResponse';
        $request = $this->getNewslettersRequest($lid, $_filter, $_limit, $_offset, $_expand, $_fields);

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
     * Create request for operation 'getNewsletters'
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
    protected function getNewslettersRequest($lid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling getNewsletters'
            );
        }

        $resourcePath = '/lists/{lid}/newsletters';
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
     * Operation getReports
     *
     * get reports for the newsletter aggregated by days
     *
     * @param  string $lid the id of the list (required)
     * @param  string $nid the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ReportResponse
     */
    public function getReports($lid, $nid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        list($response) = $this->getReportsWithHttpInfo($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields);
        return $response;
    }

    /**
     * Operation getReportsWithHttpInfo
     *
     * get reports for the newsletter aggregated by days
     *
     * @param  string $lid the id of the list (required)
     * @param  string $nid the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ReportResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getReportsWithHttpInfo($lid, $nid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\ReportResponse';
        $request = $this->getReportsRequest($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields);

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
                        '\Swagger\Client\Model\ReportResponse',
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
     * Operation getReportsAsync
     *
     * get reports for the newsletter aggregated by days
     *
     * @param  string $lid the id of the list (required)
     * @param  string $nid the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportsAsync($lid, $nid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        return $this->getReportsAsyncWithHttpInfo($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getReportsAsyncWithHttpInfo
     *
     * get reports for the newsletter aggregated by days
     *
     * @param  string $lid the id of the list (required)
     * @param  string $nid the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getReportsAsyncWithHttpInfo($lid, $nid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        $returnType = '\Swagger\Client\Model\ReportResponse';
        $request = $this->getReportsRequest($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields);

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
     * Create request for operation 'getReports'
     *
     * @param  string $lid the id of the list (required)
     * @param  string $nid the id of the newsletter (required)
     * @param  string $_filter a FIQL-Filter (optional)
     * @param  int $_limit a limit for list-responses (optional, default to 50)
     * @param  int $_offset an offset for list-responses (optional, default to 0)
     * @param  bool $_expand true if attributes should be returned or not (optional)
     * @param  string[] $_fields list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getReportsRequest($lid, $nid, $_filter = null, $_limit = '50', $_offset = '0', $_expand = null, $_fields = null)
    {
        // verify the required parameter 'lid' is set
        if ($lid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $lid when calling getReports'
            );
        }
        // verify the required parameter 'nid' is set
        if ($nid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $nid when calling getReports'
            );
        }

        $resourcePath = '/lists/{lid}/newsletters/{nid}/aggregations';
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
        if ($nid !== null) {
            $resourcePath = str_replace(
                '{' . 'nid' . '}',
                ObjectSerializer::toPathValue($nid),
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
     * Operation sendNewsletter
     *
     * Sends the newsletter to a list or group
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterSend $newsletter the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function sendNewsletter($id, $newsletter)
    {
        $this->sendNewsletterWithHttpInfo($id, $newsletter);
    }

    /**
     * Operation sendNewsletterWithHttpInfo
     *
     * Sends the newsletter to a list or group
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterSend $newsletter the data to save (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendNewsletterWithHttpInfo($id, $newsletter)
    {
        $returnType = '';
        $request = $this->sendNewsletterRequest($id, $newsletter);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
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
     * Operation sendNewsletterAsync
     *
     * Sends the newsletter to a list or group
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterSend $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendNewsletterAsync($id, $newsletter)
    {
        return $this->sendNewsletterAsyncWithHttpInfo($id, $newsletter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendNewsletterAsyncWithHttpInfo
     *
     * Sends the newsletter to a list or group
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterSend $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendNewsletterAsyncWithHttpInfo($id, $newsletter)
    {
        $returnType = '';
        $request = $this->sendNewsletterRequest($id, $newsletter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'sendNewsletter'
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterSend $newsletter the data to save (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function sendNewsletterRequest($id, $newsletter)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling sendNewsletter'
            );
        }
        // verify the required parameter 'newsletter' is set
        if ($newsletter === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $newsletter when calling sendNewsletter'
            );
        }

        $resourcePath = '/newsletters/{id}/send';
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
        if (isset($newsletter)) {
            $_tempBody = $newsletter;
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
     * Operation updateNewsletter
     *
     * update the Newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to update (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PatchResponse
     */
    public function updateNewsletter($id, $newsletter)
    {
        list($response) = $this->updateNewsletterWithHttpInfo($id, $newsletter);
        return $response;
    }

    /**
     * Operation updateNewsletterWithHttpInfo
     *
     * update the Newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to update (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PatchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateNewsletterWithHttpInfo($id, $newsletter)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateNewsletterRequest($id, $newsletter);

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
     * Operation updateNewsletterAsync
     *
     * update the Newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateNewsletterAsync($id, $newsletter)
    {
        return $this->updateNewsletterAsyncWithHttpInfo($id, $newsletter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateNewsletterAsyncWithHttpInfo
     *
     * update the Newsletter
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateNewsletterAsyncWithHttpInfo($id, $newsletter)
    {
        $returnType = '\Swagger\Client\Model\PatchResponse';
        $request = $this->updateNewsletterRequest($id, $newsletter);

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
     * Create request for operation 'updateNewsletter'
     *
     * @param  string $id the id of the newsletter (required)
     * @param  \Swagger\Client\Model\NewsletterPost $newsletter the data to update (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateNewsletterRequest($id, $newsletter)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling updateNewsletter'
            );
        }
        // verify the required parameter 'newsletter' is set
        if ($newsletter === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $newsletter when calling updateNewsletter'
            );
        }

        $resourcePath = '/newsletters/{id}';
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
        if (isset($newsletter)) {
            $_tempBody = $newsletter;
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