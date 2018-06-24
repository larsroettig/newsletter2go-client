# Swagger\Client\RecipientApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addRecipientToGroup**](RecipientApi.md#addRecipientToGroup) | **POST** /lists/{lid}/groups/{gid}/recipients/{id} | add single recipient to group
[**addRecipientsToGroup**](RecipientApi.md#addRecipientsToGroup) | **POST** /lists/{lid}/groups/{gid}/recipients | add all Recipients to the given group
[**createRecipient**](RecipientApi.md#createRecipient) | **POST** /recipients | create new recipient(s) or updates existing ones
[**deleteRecipient**](RecipientApi.md#deleteRecipient) | **DELETE** /lists/{lid}/recipients/{id} | delete the recipient
[**getRecipients**](RecipientApi.md#getRecipients) | **GET** /lists/{lid}/recipients | get all Recipients of selected list
[**getRecipientsByGroup**](RecipientApi.md#getRecipientsByGroup) | **GET** /lists/{lid}/groups/{gid}/recipients | get all Recipients of selected group
[**importRecipientsInit**](RecipientApi.md#importRecipientsInit) | **POST** /lists/{lid}/recipients/import/init | Initialize the import of recipients by file
[**importRecipientsSave**](RecipientApi.md#importRecipientsSave) | **POST** /lists/{lid}/recipients/import/save | Start the import recipients by file
[**importRecipientsStatistics**](RecipientApi.md#importRecipientsStatistics) | **GET** /import/{id}/info | Get statistics about the import by file
[**removeRecipientFromGroup**](RecipientApi.md#removeRecipientFromGroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients/{id} | remove single recipient from group
[**removeRecipientsFromGroup**](RecipientApi.md#removeRecipientsFromGroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients | remove all Recipients from given group
[**removeRecipientsFromList**](RecipientApi.md#removeRecipientsFromList) | **DELETE** /lists/{lid}/recipients | remove all Recipients from selected list
[**subscribeRecipient**](RecipientApi.md#subscribeRecipient) | **POST** /forms/submit/{code} | Creates a new recipient and sends a DOI-Mail
[**updateRecipient**](RecipientApi.md#updateRecipient) | **PATCH** /lists/{lid}/recipients/{id} | update the recipient.
[**updateRecipients**](RecipientApi.md#updateRecipients) | **PATCH** /lists/{lid}/recipients | update all Recipients in selected list


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

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    echo 'Exception when calling RecipientApi->addRecipientToGroup: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    echo 'Exception when calling RecipientApi->addRecipientsToGroup: ', $e->getMessage(), PHP_EOL;
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

# **createRecipient**
> \Swagger\Client\Model\ApiResponsePost createRecipient($recipient)

create new recipient(s) or updates existing ones

create new recipient(s).<br>If a custom attribute shall by saved for the new recipient just submit them in the json body by name.<br>If <b>multiple recipients</b> shall by saved at once, submit multiple recipient-objects as a json array.<br><b>In this case all objects must share the same attributes.</b><br/>If the e-mail-address exists already the existing recipient gets updated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recipient = new \Swagger\Client\Model\RecipientPost(); // \Swagger\Client\Model\RecipientPost | the data to save

try {
    $result = $apiInstance->createRecipient($recipient);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->createRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **recipient** | [**\Swagger\Client\Model\RecipientPost**](../Model/RecipientPost.md)| the data to save |

### Return type

[**\Swagger\Client\Model\ApiResponsePost**](../Model/ApiResponsePost.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteRecipient**
> \Swagger\Client\Model\ApiResponseDelete deleteRecipient($lid, $id)

delete the recipient

delete one recipient

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$id = "id_example"; // string | the id of the recipient

try {
    $result = $apiInstance->deleteRecipient($lid, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->deleteRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **id** | **string**| the id of the recipient |

### Return type

[**\Swagger\Client\Model\ApiResponseDelete**](../Model/ApiResponseDelete.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRecipients**
> \Swagger\Client\Model\RecipientResponse getRecipients($lid, $_filter, $_limit, $_offset, $_expand, $_fields)

get all Recipients of selected list

Get Recipients. If the API shall return custom attributes also, submit them in the _fields-Parameter by name.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    $result = $apiInstance->getRecipients($lid, $_filter, $_limit, $_offset, $_expand, $_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->getRecipients: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\RecipientResponse**](../Model/RecipientResponse.md)

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

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    echo 'Exception when calling RecipientApi->getRecipientsByGroup: ', $e->getMessage(), PHP_EOL;
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

# **importRecipientsInit**
> \Swagger\Client\Model\InlineResponse200 importRecipientsInit($lid, $file)

Initialize the import of recipients by file

Initialize the import recipients by file

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$file = "/path/to/file.txt"; // \SplFileObject | recipient file to upload

try {
    $result = $apiInstance->importRecipientsInit($lid, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->importRecipientsInit: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **file** | **\SplFileObject**| recipient file to upload |

### Return type

[**\Swagger\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **importRecipientsSave**
> \Swagger\Client\Model\ApiResponsePost importRecipientsSave($lid, $data)

Start the import recipients by file

Start the import recipients by file. The returned id can be used to fetch further statistics about the import.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$data = new \Swagger\Client\Model\Data(); // \Swagger\Client\Model\Data | the data to start the import

try {
    $result = $apiInstance->importRecipientsSave($lid, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->importRecipientsSave: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **data** | [**\Swagger\Client\Model\Data**](../Model/Data.md)| the data to start the import |

### Return type

[**\Swagger\Client\Model\ApiResponsePost**](../Model/ApiResponsePost.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **importRecipientsStatistics**
> \Swagger\Client\Model\ImportResponse importRecipientsStatistics($id)

Get statistics about the import by file

Get statistics about the import by file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the import job

try {
    $result = $apiInstance->importRecipientsStatistics($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->importRecipientsStatistics: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the import job |

### Return type

[**\Swagger\Client\Model\ImportResponse**](../Model/ImportResponse.md)

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

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    echo 'Exception when calling RecipientApi->removeRecipientFromGroup: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\RecipientApi(
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
    echo 'Exception when calling RecipientApi->removeRecipientsFromGroup: ', $e->getMessage(), PHP_EOL;
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

# **removeRecipientsFromList**
> \Swagger\Client\Model\PatchResponse removeRecipientsFromList($lid, $_filter)

remove all Recipients from selected list

remove Recipients from selected list. Pay attention to the filter, if you forget to submit it, all recipients of the current list are getting removed!

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$_filter = "_filter_example"; // string | a FIQL-Filter

try {
    $result = $apiInstance->removeRecipientsFromList($lid, $_filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->removeRecipientsFromList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **_filter** | **string**| a FIQL-Filter | [optional]

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **subscribeRecipient**
> \Swagger\Client\Model\RecipientSubscribeResponse subscribeRecipient($code, $recipient)

Creates a new recipient and sends a DOI-Mail

Creates a new recipient and sends the corresponding DOI-Mail attached to the previously created subscribe-form. The needed code can be found in the last step of the form-creation-process. The recipient will be available as soon as the recipient has confirmed the DOI-Mail.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$code = "code_example"; // string | the subscribe-code displayed when creating a subscribe-form
$recipient = new \Swagger\Client\Model\RecipientSubscribe(); // \Swagger\Client\Model\RecipientSubscribe | the recipient to subscribe

try {
    $result = $apiInstance->subscribeRecipient($code, $recipient);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->subscribeRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **code** | **string**| the subscribe-code displayed when creating a subscribe-form |
 **recipient** | [**\Swagger\Client\Model\RecipientSubscribe**](../Model/RecipientSubscribe.md)| the recipient to subscribe |

### Return type

[**\Swagger\Client\Model\RecipientSubscribeResponse**](../Model/RecipientSubscribeResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateRecipient**
> \Swagger\Client\Model\PatchResponse updateRecipient($lid, $id, $recipient)

update the recipient.

update one Recipient. If a value of a custom attribute shall by changed just submit it in the json body

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$id = "id_example"; // string | the id of the recipient
$recipient = new \Swagger\Client\Model\RecipientPatch(); // \Swagger\Client\Model\RecipientPatch | the data to update

try {
    $result = $apiInstance->updateRecipient($lid, $id, $recipient);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->updateRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **id** | **string**| the id of the recipient |
 **recipient** | [**\Swagger\Client\Model\RecipientPatch**](../Model/RecipientPatch.md)| the data to update |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateRecipients**
> \Swagger\Client\Model\PatchResponse updateRecipients($lid, $_filter)

update all Recipients in selected list

Updates all recipients in the given list where the filter applies. If a value of a custom attribute shall by changed just submit it in the json body. Pay attention to the filter, if you forget to submit it, all recipients of the current list are getting updated!

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\RecipientApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$lid = "lid_example"; // string | the id of the list
$_filter = "_filter_example"; // string | a FIQL-Filter

try {
    $result = $apiInstance->updateRecipients($lid, $_filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecipientApi->updateRecipients: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **lid** | **string**| the id of the list |
 **_filter** | **string**| a FIQL-Filter | [optional]

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

