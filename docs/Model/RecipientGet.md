# RecipientGet

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | the id of the recipient | [optional] 
**email** | **string** | the email of the recipient | [optional] 
**phone** | **string** | the phone number of the recipient | [optional] 
**gender** | **string** | m for male and f for female | [optional] 
**first_name** | **string** | the first name of the recipient | [optional] 
**last_name** | **string** | the last name of the recipient | [optional] 
**is_unsubscribed** | **bool** | weither the recipient is unsubscribed or not | [optional] 
**is_bounced** | **bool** | weither the recipient is bounced or not | [optional] 
**is_blacklisted** | **bool** | weither the recipient is blacklisted or not | [optional] 
**_custom_attribute_** | **string** | every custom attribute can be submitted | [optional] 
**rating** | **int** | Indicating the quality of the recipient. Between 0 and 5 | [optional] 
**statistic_mails_received** | **int** | how many newsletters the recipient has received | [optional] 
**statistic_mails_opened** | **int** | how many newsletters the recipient has opened | [optional] 
**statistic_mails_unique_opened** | **int** | how many newsletters the recipient has uniqly opened | [optional] 
**statistic_mails_clicked** | **int** | how often the recipient has clicked on links in newsletters | [optional] 
**statistic_conversions** | **int** | how often the recipient has converted | [optional] 
**statistic_conversions_sum** | **float** | how much the recipient has spent | [optional] 
**statistic_last_mail_action** | [**\DateTime**](\DateTime.md) | when the recipient has had the last interaction with a newsletter | [optional] 
**statistic_last_mail_received** | [**\DateTime**](\DateTime.md) | when the recipient has had received the last newsletter | [optional] 
**statistic_last_mail_opened** | [**\DateTime**](\DateTime.md) | when the recipient has had opened the last newsletter | [optional] 
**statistic_last_mail_clicked** | [**\DateTime**](\DateTime.md) | when the recipient has had clicked the last newsletter | [optional] 
**statistic_last_mail_converted** | [**\DateTime**](\DateTime.md) | when the recipient has had converted the last time | [optional] 
**statistic_last_useragent_device** | **string** | the last useragent device used for opening a newsletter | [optional] 
**statistic_last_useragent_family** | **string** | the last useragent family used for opening a newsletter | [optional] 
**statistic_last_latitude** | **double** | the last latitude where the recipient has opened a newsletter | [optional] 
**statistic_last_longitude** | **double** | the last longitude where the recipient has opened a newsletter | [optional] 
**statistic_last_blacklist_list** | [**\DateTime**](\DateTime.md) | when the recipient was blacklisted the last time | [optional] 
**statistic_last_unsubscribe_list** | [**\DateTime**](\DateTime.md) | when the recipient was unsubscribed the last time | [optional] 
**statistic_last_blacklist_list_reason** | **string** | the reason the recipient got blacklisted the last time | [optional] 
**statistic_last_unsubscribe_list_reason** | **string** | the reason the recipient got unsubscribed the last time | [optional] 
**statistic_last_bounce** | [**\DateTime**](\DateTime.md) | when the recipient is bounced the last time | [optional] 
**statistic_last_bounce_reason** | **string** | the reason the recipient is bounced the last time | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


