# Swagger\Client\GroupApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addRecipientToGroup**](GroupApi.md#addRecipientToGroup) | **POST** /lists/{lid}/groups/{gid}/recipients/{id} | add single recipient to group
[**addRecipientsToGroup**](GroupApi.md#addRecipientsToGroup) | **POST** /lists/{lid}/groups/{gid}/recipients | add all Recipients to the given group
[**createGroup**](GroupApi.md#createGroup) | **POST** /groups | creates a new group
[**deleteGroup**](GroupApi.md#deleteGroup) | **DELETE** /groups/{id} | delete the Group
[**getGroups**](GroupApi.md#getGroups) | **GET** /lists/{lid}/groups | get all Group of selected list
[**getRecipientsByGroup**](GroupApi.md#getRecipientsByGroup) | **GET** /lists/{lid}/groups/{gid}/recipients | get all Recipients of selected group
[**removeRecipientFromGroup**](GroupApi.md#removeRecipientFromGroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients/{id} | remove single recipient from group
[**removeRecipientsFromGroup**](GroupApi.md#removeRecipientsFromGroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients | remove all Recipients from given group
[**updateGroup**](GroupApi.md#updateGroup) | **PATCH** /groups/{id} | update the Group


# **addRecipientToGroup**
> \Swagger\Client\Model\PatchResponse addRecipientToGroup($lid, $gid, $id)

add single recipient to group

add Recipient to Group

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$gid = "gid_example"; // string | the id of the group
$id = "id_example"; // string | the id of the recipient

try {
    $result = $apiInstance->addRecipientToGroup($lid, $gid, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->addRecipientToGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **gid** | **string**| the id of the group |
 **id** | **string**| the id of the recipient |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addRecipientsToGroup**
> \Swagger\Client\Model\PatchResponse addRecipientsToGroup($lid, $gid, $_filter)

add all Recipients to the given group

add all Recipients to the given group. Pay attention to the filter, if you forget to submit it, all recipients of the current list are getting added to the group!

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$gid = "gid_example"; // string | the id of the group
$_filter = "_filter_example"; // string | a FIQL-Filter

try {
    $result = $apiInstance->addRecipientsToGroup($lid, $gid, $_filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->addRecipientsToGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **gid** | **string**| the id of the group |
 **_filter** | **string**| a FIQL-Filter | [optional]

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createGroup**
> \Swagger\Client\Model\ApiResponsePost createGroup($group)

creates a new group

creates a new group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group = new \Swagger\Client\Model\GroupPost(); // \Swagger\Client\Model\GroupPost | the data to save

try {
    $result = $apiInstance->createGroup($group);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->createGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **group** | [**\Swagger\Client\Model\GroupPost**](../Model/GroupPost.md)| the data to save |

### Return type

[**\Swagger\Client\Model\ApiResponsePost**](../Model/ApiResponsePost.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteGroup**
> \Swagger\Client\Model\ApiResponseDelete deleteGroup($id)

delete the Group

delete one Group

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the Group

try {
    $result = $apiInstance->deleteGroup($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->deleteGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the Group |

### Return type

[**\Swagger\Client\Model\ApiResponseDelete**](../Model/ApiResponseDelete.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getGroups**
> \Swagger\Client\Model\GroupResponse getGroups($lid, $_filter, $_limit, $_offset, $_expand, $_fields)

get all Group of selected list

get Groups

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
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
    $result = $apiInstance->getGroups($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->getGroups: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\GroupResponse**](../Model/GroupResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRecipientsByGroup**
> \Swagger\Client\Model\RecipientResponse getRecipientsByGroup($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields)

get all Recipients of selected group

get Recipients

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$gid = "gid_example"; // string | the id of the group
$_filter = "_filter_example"; // string | a FIQL-Filter
$_limit = 50; // int | a limit for list-responses
$_offset = 0; // int | an offset for list-responses
$_expand = true; // bool | true if attributes should be returned or not
$_fields = array("_fields_example"); // string[] | list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed

try {
    $result = $apiInstance->getRecipientsByGroup($lid, $gid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->getRecipientsByGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **gid** | **string**| the id of the group |
 **_filter** | **string**| a FIQL-Filter | [optional]
 **_limit** | **int**| a limit for list-responses | [optional] [default to 50]
 **_offset** | **int**| an offset for list-responses | [optional] [default to 0]
 **_expand** | **bool**| true if attributes should be returned or not | [optional]
 **_fields** | [**string[]**](../Model/string.md)| list of case-sensetive fields which should be returned.    Only needed if _expand is false or special attributes are needed | [optional]

### Return type

[**\Swagger\Client\Model\RecipientResponse**](../Model/RecipientResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeRecipientFromGroup**
> \Swagger\Client\Model\PatchResponse removeRecipientFromGroup($lid, $gid, $id)

remove single recipient from group

remove Recipient to Group

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$gid = "gid_example"; // string | the id of the group
$id = "id_example"; // string | the id of the recipient

try {
    $result = $apiInstance->removeRecipientFromGroup($lid, $gid, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->removeRecipientFromGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **gid** | **string**| the id of the group |
 **id** | **string**| the id of the recipient |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeRecipientsFromGroup**
> \Swagger\Client\Model\PatchResponse removeRecipientsFromGroup($lid, $gid, $_filter)

remove all Recipients from given group

remove all Recipients from given group. Pay attention to the filter, if you forget to submit it, all recipients are getting removed from the group!

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$gid = "gid_example"; // string | the id of the group
$_filter = "_filter_example"; // string | a FIQL-Filter

try {
    $result = $apiInstance->removeRecipientsFromGroup($lid, $gid, $_filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->removeRecipientsFromGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **gid** | **string**| the id of the group |
 **_filter** | **string**| a FIQL-Filter | [optional]

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateGroup**
> \Swagger\Client\Model\PatchResponse updateGroup($id, $group)

update the Group

update one Group

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\GroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the Group
$group = new \Swagger\Client\Model\GroupPatch(); // \Swagger\Client\Model\GroupPatch | the data to update

try {
    $result = $apiInstance->updateGroup($id, $group);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->updateGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the Group |
 **group** | [**\Swagger\Client\Model\GroupPatch**](../Model/GroupPatch.md)| the data to update |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

