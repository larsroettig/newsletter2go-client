# SwaggerClient-php
<h5>JSON first</h5><br/>Our REST API exchanges data in the JSON data format. Every parameter you pass (with a few exceptions e.g. when you upload files) should therefore be formatted in JSON and our API will always return results in JSON as well.<br/><br/><h5>Very RESTful</h5><br/>Our API follows a very RESTful approach.<br/>Most importantly, we implemented the following four request methods for CRUD operations:<br/><br/>POST - Create a new record<br/>GET - Retrieve / read records without changing anything<br/>PATCH - Update an existing record<br/>DELETE - Delete one or more records<br/><br/><h5>HTTP Status codes</h5><br/>We also follow the most common HTTP status codes when outputting the API response:<br/><br/><b>2xx - Successful calls</b><br/>200 - Success<br/>201 - Created<br/><br/><b>4xx - Error codes</b><br/>400 - API error - inspect the body for detailed information about what went wrong. The most common error is \"code\":1062, which means, that a unique constraint was hit. For example if the name of the group is already in use.<br/>401 - Not authenticated - invalid access_token. Check if the access_token has expired or is incorrect.<br/>403 - Access denied<br/>404 - Call not available or no records found<br/><br/><b>5xx - API error - please contact support</b><br/><br/><h5>Response format</h5><br/>The API always returns data in the following format<br/><br/><code>{<br/>&nbsp;&nbsp;\"info\": {<br/>&nbsp;&nbsp;&nbsp;&nbsp;\"count\": 0<br/>&nbsp;&nbsp;},<br/>&nbsp;&nbsp;\"value\": [<br/>&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;\"key\": \"value\"<br/>&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;]<br/>}</code><br/><br/><h5>Recurring GET parameters</h5><br/><ul><li>_filter - a complex filter for filtering the result set based on <a target=\"blank\" href=\"https://tools.ietf.org/html/draft-nottingham-atompub-fiql-00\">FIQL</a>.</li><li>_limit - the maximum number records returned.</li><li>_offset - pagination for the result-set</li><li>_expand - submit true to get all default fields of the resource</li><li>_fields - submit a comma-separated list of case-sensetive field-names to get the values of these fields in the response. You can use this the get values of custom attribute of recipients for example.</li></ul><br/><br/><h5>Filter language</h5><br/>The filter language for filtering results is based on <a target=\"blank\" href=\"https://tools.ietf.org/html/draft-nottingham-atompub-fiql-00\">FIQL</a>.<br/>With the only restriction, that plain values must be surrounded by \". For example first_name==\"Max\"<br/>The following operators are supported<ul><li>Equals - <b>==</b></li><li>Not equals - <b>=ne=</b></li><li>Greater than - <b>=gt=</b></li><li>Greater than equals - <b>=ge=</b></li><li>Lower than - <b>=lt=</b></li><li>Lower than equals - <b>=le=</b></li><li>Like - <b>=like=</b> (in combination with % you are able to search for <i>starts with</i>, <i>ends with</i>, <i>contains</i>. For example first_name=like=\"%Max%\")</li><li>Not like - <b>=nlike=</b></li><li>Logical and - <b>;</b></li><li>Logical or - <b>,</b></li></ul><br/><br/><h5>How to make Calls?</h5><br/>After you authenticated and received a valid access_token, you have to pass it in every consecutive call. Use the Authorization header for that purpose as follows:<br/><code>xhr.setRequestHeader(\"Authorization\", \"Bearer \" + your_access_token);</code><br/><br/>Every call takes additional parameters that can be used to modify the request. These parameters should be passed as JSON<br/><code>var params = {<br/>&nbsp;&nbsp;\"key\"= \"value\"<br/>}<br/>xhr.send(JSON.stringify(params));</code><br/><br/><h5>Sending transactional emails</h5><br/>It is very important to understand the following concept in order for you to take full advantage of our powerful personalization features and our detailed reports when sending transactional emails.<br/><br/>First, you will have to create a new mailing. We recommend that you create that mailing through our UI in order to take full advantage of our powerful newsletter builder. This way, we will automatically create cross-client optimized and responsive HTML. Yet another advantage lies in the possibility for other users (e.g. the marketing team) to change the layout or the content of the mailing without having to contact the developer (you).<br/><br/>Of course, it is also possible to create a mailing through the API. When doing so, you can also take advantage of our cross-client optimized responsive HTML by passing us JSON or YAML according to the Newsletter2Go Markup Language.<br/>No matter how you create the mailing, try to create *one* reusable template. You can customize individual emails by inserting placeholders for personalized fields such as name, products or other information that will be filled through an API call when sending.<br/><br/>By only creating one template, you can take advantage of our full reporting since all emails will be treated part of a \"campaign\". When you change that template, we will create a new version of the mailing in the background and you will be able to see the difference in performance in the reports. This is particularily useful when you are trying to test and optimize different versions of transactional emails such as a sign up email.<br/><br/>After creating a mailing, you will have access to its ID. Use that ID to actually send the email in the next step.<br/><br/>When sending an email, you have to pass the newsletter ID and information about the recipient. Either pass the recipient ID or pass all the recipient's data (including the e-mail-address) as JSON.<br/><br/>If you only pass the recipient ID, we will use his or her data from your list to personalize the mailing. If you pass full recipient data as JSON, we will try to merge the data with existing data from your list.<br/><br/>You can also pass additional data such as product data which is not saved in your list. Just make sure that the placeholders in the source of the mailing correspond to the parameters that you are passing.<br/>This way you can also create for-loops which can be useful if you pass different amounts of data for each recipient (e.g. a purchase confirmation where you want to list all the products that were just bought).

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0.0
- Build package: io.swagger.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com//.git"
    }
  ],
  "require": {
    "/": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## Documentation for API Endpoints

All URIs are relative to *https://api.newsletter2go.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AttributeApi* | [**createAttribute**](docs/Api/AttributeApi.md#createattribute) | **POST** /attributes | creates a new attribute
*AttributeApi* | [**deleteAttribute**](docs/Api/AttributeApi.md#deleteattribute) | **DELETE** /lists/{lid}/attributes/{id} | delete the attribute
*AttributeApi* | [**getAttributes**](docs/Api/AttributeApi.md#getattributes) | **GET** /lists/{lid}/attributes | get all Attributes of selected list
*AttributeApi* | [**updateAttribute**](docs/Api/AttributeApi.md#updateattribute) | **PATCH** /attributes/{id} | update the attribute
*AuthorizationApi* | [**getToken**](docs/Api/AuthorizationApi.md#gettoken) | **POST** /oauth/v2/token | Endpoint for retrieving a token
*CompanyApi* | [**getCompany**](docs/Api/CompanyApi.md#getcompany) | **GET** /companies | get the details of a company
*CompanyApi* | [**updateCompany**](docs/Api/CompanyApi.md#updatecompany) | **PATCH** /companies/{id} | update the Company
*GroupApi* | [**addRecipientToGroup**](docs/Api/GroupApi.md#addrecipienttogroup) | **POST** /lists/{lid}/groups/{gid}/recipients/{id} | add single recipient to group
*GroupApi* | [**addRecipientsToGroup**](docs/Api/GroupApi.md#addrecipientstogroup) | **POST** /lists/{lid}/groups/{gid}/recipients | add all Recipients to the given group
*GroupApi* | [**createGroup**](docs/Api/GroupApi.md#creategroup) | **POST** /groups | creates a new group
*GroupApi* | [**deleteGroup**](docs/Api/GroupApi.md#deletegroup) | **DELETE** /groups/{id} | delete the Group
*GroupApi* | [**getGroups**](docs/Api/GroupApi.md#getgroups) | **GET** /lists/{lid}/groups | get all Group of selected list
*GroupApi* | [**getRecipientsByGroup**](docs/Api/GroupApi.md#getrecipientsbygroup) | **GET** /lists/{lid}/groups/{gid}/recipients | get all Recipients of selected group
*GroupApi* | [**removeRecipientFromGroup**](docs/Api/GroupApi.md#removerecipientfromgroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients/{id} | remove single recipient from group
*GroupApi* | [**removeRecipientsFromGroup**](docs/Api/GroupApi.md#removerecipientsfromgroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients | remove all Recipients from given group
*GroupApi* | [**updateGroup**](docs/Api/GroupApi.md#updategroup) | **PATCH** /groups/{id} | update the Group
*ListApi* | [**createList**](docs/Api/ListApi.md#createlist) | **POST** /lists | creates a new list
*ListApi* | [**deleteList**](docs/Api/ListApi.md#deletelist) | **DELETE** /lists/{id} | delete the List
*ListApi* | [**getLists**](docs/Api/ListApi.md#getlists) | **GET** /lists | get all lists
*ListApi* | [**getRecipients**](docs/Api/ListApi.md#getrecipients) | **GET** /lists/{lid}/recipients | get all Recipients of selected list
*ListApi* | [**removeRecipientsFromList**](docs/Api/ListApi.md#removerecipientsfromlist) | **DELETE** /lists/{lid}/recipients | remove all Recipients from selected list
*ListApi* | [**updateList**](docs/Api/ListApi.md#updatelist) | **PATCH** /lists/{id} | update the List
*ListApi* | [**updateRecipients**](docs/Api/ListApi.md#updaterecipients) | **PATCH** /lists/{lid}/recipients | update all Recipients in selected list
*NewsletterApi* | [**createNewsletter**](docs/Api/NewsletterApi.md#createnewsletter) | **POST** /lists/{lid}/newsletters | creates a new newsletter
*NewsletterApi* | [**getNewsletter**](docs/Api/NewsletterApi.md#getnewsletter) | **GET** /newsletters/{id} | get one newsletter
*NewsletterApi* | [**getNewsletters**](docs/Api/NewsletterApi.md#getnewsletters) | **GET** /lists/{lid}/newsletters | get all newsletters of the given list
*NewsletterApi* | [**getReports**](docs/Api/NewsletterApi.md#getreports) | **GET** /lists/{lid}/newsletters/{nid}/aggregations | get reports for the newsletter aggregated by days
*NewsletterApi* | [**sendNewsletter**](docs/Api/NewsletterApi.md#sendnewsletter) | **POST** /newsletters/{id}/send | Sends the newsletter to a list or group
*NewsletterApi* | [**updateNewsletter**](docs/Api/NewsletterApi.md#updatenewsletter) | **PATCH** /newsletters/{id} | update the Newsletter
*RecipientApi* | [**addRecipientToGroup**](docs/Api/RecipientApi.md#addrecipienttogroup) | **POST** /lists/{lid}/groups/{gid}/recipients/{id} | add single recipient to group
*RecipientApi* | [**addRecipientsToGroup**](docs/Api/RecipientApi.md#addrecipientstogroup) | **POST** /lists/{lid}/groups/{gid}/recipients | add all Recipients to the given group
*RecipientApi* | [**createRecipient**](docs/Api/RecipientApi.md#createrecipient) | **POST** /recipients | create new recipient(s) or updates existing ones
*RecipientApi* | [**deleteRecipient**](docs/Api/RecipientApi.md#deleterecipient) | **DELETE** /lists/{lid}/recipients/{id} | delete the recipient
*RecipientApi* | [**getRecipients**](docs/Api/RecipientApi.md#getrecipients) | **GET** /lists/{lid}/recipients | get all Recipients of selected list
*RecipientApi* | [**getRecipientsByGroup**](docs/Api/RecipientApi.md#getrecipientsbygroup) | **GET** /lists/{lid}/groups/{gid}/recipients | get all Recipients of selected group
*RecipientApi* | [**importRecipientsInit**](docs/Api/RecipientApi.md#importrecipientsinit) | **POST** /lists/{lid}/recipients/import/init | Initialize the import of recipients by file
*RecipientApi* | [**importRecipientsSave**](docs/Api/RecipientApi.md#importrecipientssave) | **POST** /lists/{lid}/recipients/import/save | Start the import recipients by file
*RecipientApi* | [**importRecipientsStatistics**](docs/Api/RecipientApi.md#importrecipientsstatistics) | **GET** /import/{id}/info | Get statistics about the import by file
*RecipientApi* | [**removeRecipientFromGroup**](docs/Api/RecipientApi.md#removerecipientfromgroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients/{id} | remove single recipient from group
*RecipientApi* | [**removeRecipientsFromGroup**](docs/Api/RecipientApi.md#removerecipientsfromgroup) | **DELETE** /lists/{lid}/groups/{gid}/recipients | remove all Recipients from given group
*RecipientApi* | [**removeRecipientsFromList**](docs/Api/RecipientApi.md#removerecipientsfromlist) | **DELETE** /lists/{lid}/recipients | remove all Recipients from selected list
*RecipientApi* | [**subscribeRecipient**](docs/Api/RecipientApi.md#subscriberecipient) | **POST** /forms/submit/{code} | Creates a new recipient and sends a DOI-Mail
*RecipientApi* | [**updateRecipient**](docs/Api/RecipientApi.md#updaterecipient) | **PATCH** /lists/{lid}/recipients/{id} | update the recipient.
*RecipientApi* | [**updateRecipients**](docs/Api/RecipientApi.md#updaterecipients) | **PATCH** /lists/{lid}/recipients | update all Recipients in selected list
*ReportApi* | [**getReports**](docs/Api/ReportApi.md#getreports) | **GET** /lists/{lid}/newsletters/{nid}/aggregations | get reports for the newsletter aggregated by days
*UserApi* | [**getUsers**](docs/Api/UserApi.md#getusers) | **GET** /users | get all users of the company where the current user has access to
*UserApi* | [**updateUser**](docs/Api/UserApi.md#updateuser) | **PATCH** /users/{id} | update the user


## Documentation For Models

 - [ApiResponseDelete](docs/Model/ApiResponseDelete.md)
 - [ApiResponsePost](docs/Model/ApiResponsePost.md)
 - [AttributeGet](docs/Model/AttributeGet.md)
 - [AttributePatch](docs/Model/AttributePatch.md)
 - [AttributePost](docs/Model/AttributePost.md)
 - [AttributeResponse](docs/Model/AttributeResponse.md)
 - [CompanyGet](docs/Model/CompanyGet.md)
 - [CompanyPatch](docs/Model/CompanyPatch.md)
 - [CompanyResponse](docs/Model/CompanyResponse.md)
 - [Data](docs/Model/Data.md)
 - [Error](docs/Model/Error.md)
 - [GroupGet](docs/Model/GroupGet.md)
 - [GroupPatch](docs/Model/GroupPatch.md)
 - [GroupPost](docs/Model/GroupPost.md)
 - [GroupResponse](docs/Model/GroupResponse.md)
 - [ImportGet](docs/Model/ImportGet.md)
 - [ImportResponse](docs/Model/ImportResponse.md)
 - [Info](docs/Model/Info.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [ListGet](docs/Model/ListGet.md)
 - [ListPost](docs/Model/ListPost.md)
 - [ListResponse](docs/Model/ListResponse.md)
 - [ModelWithId](docs/Model/ModelWithId.md)
 - [NewsletterGet](docs/Model/NewsletterGet.md)
 - [NewsletterPost](docs/Model/NewsletterPost.md)
 - [NewsletterResponse](docs/Model/NewsletterResponse.md)
 - [NewsletterSend](docs/Model/NewsletterSend.md)
 - [PatchResponse](docs/Model/PatchResponse.md)
 - [RecipientGet](docs/Model/RecipientGet.md)
 - [RecipientPatch](docs/Model/RecipientPatch.md)
 - [RecipientPost](docs/Model/RecipientPost.md)
 - [RecipientResponse](docs/Model/RecipientResponse.md)
 - [RecipientSimple](docs/Model/RecipientSimple.md)
 - [RecipientSubscribe](docs/Model/RecipientSubscribe.md)
 - [RecipientSubscribeRecipient](docs/Model/RecipientSubscribeRecipient.md)
 - [RecipientSubscribeResponse](docs/Model/RecipientSubscribeResponse.md)
 - [RecipientSubscribeResponseValue](docs/Model/RecipientSubscribeResponseValue.md)
 - [RecipientSubscribeResponseValueResult](docs/Model/RecipientSubscribeResponseValueResult.md)
 - [RecipientSubscribeResponseValueResultError](docs/Model/RecipientSubscribeResponseValueResultError.md)
 - [RecipientSubscribeResponseValueResultErrorRecipients](docs/Model/RecipientSubscribeResponseValueResultErrorRecipients.md)
 - [RecipientSubscribeResponseValueResultSuccess](docs/Model/RecipientSubscribeResponseValueResultSuccess.md)
 - [Report](docs/Model/Report.md)
 - [ReportResponse](docs/Model/ReportResponse.md)
 - [Token](docs/Model/Token.md)
 - [UserGet](docs/Model/UserGet.md)
 - [UserPatch](docs/Model/UserPatch.md)
 - [UserResponse](docs/Model/UserResponse.md)


## Documentation For Authorization


## Basic

- **Type**: HTTP basic authentication

## OAuth

- **Type**: OAuth
- **Flow**: implicit
- **Authorization URL**: /oauth/v2/token
- **Scopes**: N/A


## Author

support@newsletter2go.com


