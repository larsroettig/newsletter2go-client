# Swagger\Client\CompanyApi

All URIs are relative to *https://api.newsletter2go.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getCompany**](CompanyApi.md#getCompany) | **GET** /companies | get the details of a company
[**updateCompany**](CompanyApi.md#updateCompany) | **PATCH** /companies/{id} | update the Company


# **getCompany**
> \Swagger\Client\Model\CompanyResponse getCompany()

get the details of a company

get the details of a company

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompany();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getCompany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateCompany**
> \Swagger\Client\Model\PatchResponse updateCompany($id, $company)

update the Company

update the Company

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | the id of the Company
$company = new \Swagger\Client\Model\CompanyPatch(); // \Swagger\Client\Model\CompanyPatch | the data to update

try {
    $result = $apiInstance->updateCompany($id, $company);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->updateCompany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| the id of the Company |
 **company** | [**\Swagger\Client\Model\CompanyPatch**](../Model/CompanyPatch.md)| the data to update |

### Return type

[**\Swagger\Client\Model\PatchResponse**](../Model/PatchResponse.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

