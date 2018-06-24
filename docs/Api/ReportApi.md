# Swagger\Client\ReportApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getReports**](ReportApi.md#getReports) | **GET** /lists/{lid}/newsletters/{nid}/aggregations | get reports for the newsletter aggregated by days


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

$apiInstance = new Swagger\Client\Api\ReportApi(
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
    echo 'Exception when calling ReportApi->getReports: ', $e->getMessage(), PHP_EOL;
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

