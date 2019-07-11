# SMS Gateway Handler

This Laravel Package will helpto  send SMS through various SMS Gateways simpler than ever.


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
2. Call function

    Syntax:- ***SMS::($to,$message);***

    ```
    SMS::send(9567######,"Thank you!");
    ```


    `to`: Single mobile number or an array of numbers

    Note: Its basic function in the package




