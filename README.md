[![GitHub issues](https://img.shields.io/github/issues/shihabEK/Sms-Gateway-Handler.svg)](https://github.com/shihabEK/Sms-Gateway-Handler/issues)
[![GitHub forks](https://img.shields.io/github/forks/shihabEK/Sms-Gateway-Handler.svg)](https://github.com/shihabEK/Sms-Gateway-Handler/network)
[![GitHub stars](https://img.shields.io/github/stars/shihabEK/Sms-Gateway-Handler.svg)](https://github.com/shihabEK/Sms-Gateway-Handler/stargazers)
[![GitHub license](https://img.shields.io/github/license/shihabEK/Sms-Gateway-Handler.svg)](https://github.com/shihabEK/Sms-Gateway-Handler)
![GitHub All Releases](https://img.shields.io/github/downloads/shihabEK/Sms-Gateway-Handler/total.svg)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/shihabEK/Sms-Gateway-Handler.svg?style=social)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FshihabEK%2FSms-Gateway-Handler)
---
# SMS Gateway Handler

This Laravel Package will helpto  send SMS through various SMS Gateways simpler than ever.

### Supported Gateways

1. [MSG91  ](https://msg91.com/)
2. [TextLocal](https://www.textlocal.com/)


### Installation


1. Include the package in your project

    ```
    composer require "shaab/sms"
    ```

2. Add the service provider to your `config/app.php` providers array:

    **If you're installing on Laravel 5.5+ skip this step**

    * Add providers
        ```
        shaab\sms\SmsServiceProvider::class,
        ```
    * Add Aliase
        ```
        'SMS'   =>  shaab\sms\Facades\sms::class,
        ```
3. Publish the Vendor Config files by running:

    ```
    php artisan vendor:publish --provider="shaab\sms\SmsServiceProvider"
    ```

    * **Config the SMS Gateway in `Config/sms.php`.**

### Usage

1.  Add Facade to the controller:

    ```
    use shaab\sms\Facades\sms;
    ```
2. Call Send function

    * **Minimal**

        Syntax: ***SMS::send($to,$message);***

        ```
        SMS::send(9567######,"Thank you!");
        ```

        `to`: Single mobile number or an array of numbers

        Note: Its basic function in the package.

    * **Advanced**

        --In development--


3. Check SMS Balance

    * MSG91

        Syntax: ***SMS::msg91_balance(`Route`);***
        ```
        SMS::msg91_balance(4);
        ```
        Output: Return sms balance in given route.

    * TextLocal

        ```
        SMS::textlocal_balance();
        ```
        Output: Return sms balance in given route.



