# NewsletterPost

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | the type of newsletter | [optional] [default to 'default']
**name** | **string** | a name for the newsletter | [optional] 
**description** | **string** | a description for the newsletter | [optional] 
**has_open_tracking** | **bool** | weither open_tracking is enabled or not | [optional] 
**has_click_tracking** | **bool** | weither click_tracking is enabled or not | [optional] 
**has_conversion_tracking** | **bool** | weither click_tracking is enabled or not | [optional] 
**json** | **string** | the json-description of the content. | [optional] 
**html** | **string** | the html content of the newsletter. Is needed when json is not submitted. Otherwise html is optional and will override the html generated out of the json. | [optional] 
**text** | **string** | the text content of the newsletter. If submitted, it will overwrite the automatically generated text-version out of json/html | [optional] 
**subject** | **string** | the subject of the newsletter | [optional] 
**preheader** | **string** | the preheader of the newsletter | [optional] 
**header_reply_email** | **string** | the reply email send in the header of the newsletter | [optional] 
**header_reply_name** | **string** | the reply name send in the header of the newsletter | [optional] 
**header_from_email** | **string** | the from email send in the header of the newsletter | [optional] 
**header_from_name** | **string** | the from name send in the header of the newsletter | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


