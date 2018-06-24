# Swagger\Client\AttributeApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAttribute**](AttributeApi.md#createAttribute) | **POST** /attributes | creates a new attribute
[**deleteAttribute**](AttributeApi.md#deleteAttribute) | **DELETE** /lists/{lid}/attributes/{id} | delete the attribute
[**getAttributes**](AttributeApi.md#getAttributes) | **GET** /lists/{lid}/attributes | get all Attributes of selected list
[**updateAttribute**](AttributeApi.md#updateAttribute) | **PATCH** /attributes/{id} | update the attribute


# **createAttribute**
> \Swagger\Client\Model\ApiResponsePost createAttribute($attribute)

creates a new attribute

creates a new attribute.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\AttributeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$attribute = new \Swagger\Client\Model\AttributePost(); // \Swagger\Client\Model\AttributePost | the data to save

try {
    $result = $apiInstance->createAttribute($attribute);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttributeApi->createAttribute: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **attribute** | [**\Swagger\Client\Model\AttributePost**](../Model/AttributePost.md)| the data to save |

### Return type

[**\Swagger\Client\Model\ApiResponsePost**](../Model/ApiResponsePost.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteAttribute**
> \Swagger\Client\Model\ApiResponseDelete deleteAttribute($lid, $id)

delete the attribute

delete one attribute

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\AttributeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$id = "id_example"; // string | the id of the attribute

try {
    $result = $apiInstance->deleteAttribute($lid, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttributeApi->deleteAttribute: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **id** | **string**| the id of the attribute |

### Return type

[**\Swagger\Client\Model\ApiResponseDelete**](../Model/ApiResponseDelete.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAttributes**
> \Swagger\Client\Model\AttributeResponse getAttributes($lid, $_filter, $_limit, $_offset, $_expand, $_fields)

get all Attributes of selected list

get Attributes

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\AttributeApi(
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
    $result = $apiInstance->getAttributes($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttributeApi->getAttributes: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\AttributeResponse**](../Model/AttributeResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAttribute**
> \Swagger\Client\Model\PatchResponse updateAttribute($id, $attribute)

update the attribute

update one attribute

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\AttributeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the attribute
$attribute = new \Swagger\Client\Model\AttributePatch(); // \Swagger\Client\Model\AttributePatch | the data to update

try {
    $result = $apiInstance->updateAttribute($id, $attribute);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttributeApi->updateAttribute: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the attribute |
 **attribute** | [**\Swagger\Client\Model\AttributePatch**](../Model/AttributePatch.md)| the data to update |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

