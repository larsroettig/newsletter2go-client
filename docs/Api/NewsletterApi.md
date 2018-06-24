# Swagger\Client\NewsletterApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createNewsletter**](NewsletterApi.md#createNewsletter) | **POST** /lists/{lid}/newsletters | creates a new newsletter
[**getNewsletter**](NewsletterApi.md#getNewsletter) | **GET** /newsletters/{id} | get one newsletter
[**getNewsletters**](NewsletterApi.md#getNewsletters) | **GET** /lists/{lid}/newsletters | get all newsletters of the given list
[**getReports**](NewsletterApi.md#getReports) | **GET** /lists/{lid}/newsletters/{nid}/aggregations | get reports for the newsletter aggregated by days
[**sendNewsletter**](NewsletterApi.md#sendNewsletter) | **POST** /newsletters/{id}/send | Sends the newsletter to a list or group
[**updateNewsletter**](NewsletterApi.md#updateNewsletter) | **PATCH** /newsletters/{id} | update the Newsletter


# **createNewsletter**
> \Swagger\Client\Model\ApiResponsePost createNewsletter($lid, $newsletter)

creates a new newsletter

creates a new Newsletter

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$newsletter = new \Swagger\Client\Model\NewsletterPost(); // \Swagger\Client\Model\NewsletterPost | the data to save

try {
    $result = $apiInstance->createNewsletter($lid, $newsletter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->createNewsletter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **newsletter** | [**\Swagger\Client\Model\NewsletterPost**](../Model/NewsletterPost.md)| the data to save |

### Return type

[**\Swagger\Client\Model\ApiResponsePost**](../Model/ApiResponsePost.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getNewsletter**
> \Swagger\Client\Model\NewsletterResponse getNewsletter($id, $_filter, $_fields)

get one newsletter

get Newsletter

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the newsletter
$_filter = "_filter_example"; // string | a FIQL-Filter
$_fields = array("_fields_example"); // string[] | list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed

try {
    $result = $apiInstance->getNewsletter($id, $_filter, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->getNewsletter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the newsletter |
 **_filter** | **string**| a FIQL-Filter | [optional]
 **_fields** | [**string[]**](../Model/string.md)| list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed | [optional]

### Return type

[**\Swagger\Client\Model\NewsletterResponse**](../Model/NewsletterResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getNewsletters**
> \Swagger\Client\Model\NewsletterResponse getNewsletters($lid, $_filter, $_limit, $_offset, $_expand, $_fields)

get all newsletters of the given list

get Newsletters

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$_filter = "_filter_example"; // string | a FIQL-Filter
$_limit = 50; // int | a limit for list-responses
$_offset = 0; // int | an offset for list-responses
$_expand = true; // bool | true if attributes should be returned or not
$_fields = array("_fields_example"); // string[] | list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed

try {
    $result = $apiInstance->getNewsletters($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->getNewsletters: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **_filter** | **string**| a FIQL-Filter | [optional]
 **_limit** | **int**| a limit for list-responses | [optional] [default to 50]
 **_offset** | **int**| an offset for list-responses | [optional] [default to 0]
 **_expand** | **bool**| true if attributes should be returned or not | [optional]
 **_fields** | [**string[]**](../Model/string.md)| list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed | [optional]

### Return type

[**\Swagger\Client\Model\NewsletterResponse**](../Model/NewsletterResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getReports**
> \Swagger\Client\Model\ReportResponse getReports($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields)

get reports for the newsletter aggregated by days

get reports for the newsletter aggregated by days

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$nid = "nid_example"; // string | the id of the newsletter
$_filter = "_filter_example"; // string | a FIQL-Filter
$_limit = 50; // int | a limit for list-responses
$_offset = 0; // int | an offset for list-responses
$_expand = true; // bool | true if attributes should be returned or not
$_fields = array("_fields_example"); // string[] | list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed

try {
    $result = $apiInstance->getReports($lid, $nid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->getReports: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **nid** | **string**| the id of the newsletter |
 **_filter** | **string**| a FIQL-Filter | [optional]
 **_limit** | **int**| a limit for list-responses | [optional] [default to 50]
 **_offset** | **int**| an offset for list-responses | [optional] [default to 0]
 **_expand** | **bool**| true if attributes should be returned or not | [optional]
 **_fields** | [**string[]**](../Model/string.md)| list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed | [optional]

### Return type

[**\Swagger\Client\Model\ReportResponse**](../Model/ReportResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendNewsletter**
> sendNewsletter($id, $newsletter)

Sends the newsletter to a list or group



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the newsletter
$newsletter = new \Swagger\Client\Model\NewsletterSend(); // \Swagger\Client\Model\NewsletterSend | the data to save

try {
    $apiInstance->sendNewsletter($id, $newsletter);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->sendNewsletter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the newsletter |
 **newsletter** | [**\Swagger\Client\Model\NewsletterSend**](../Model/NewsletterSend.md)| the data to save |

### Return type

void (empty response body)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateNewsletter**
> \Swagger\Client\Model\PatchResponse updateNewsletter($id, $newsletter)

update the Newsletter

update one Newsletter

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\NewsletterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the newsletter
$newsletter = new \Swagger\Client\Model\NewsletterPost(); // \Swagger\Client\Model\NewsletterPost | the data to update

try {
    $result = $apiInstance->updateNewsletter($id, $newsletter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsletterApi->updateNewsletter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the newsletter |
 **newsletter** | [**\Swagger\Client\Model\NewsletterPost**](../Model/NewsletterPost.md)| the data to update |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

