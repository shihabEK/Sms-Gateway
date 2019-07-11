# SMS Gateway Handler

This Laravel Package will helpto  send SMS through various SMS Gateways simpler than ever.


### Installation


1. Include the package in your project

    ```
    composer require "shaab/sms"
    ```

2. Add the service provider to your `config/app.php` providers array:


    ```
    shaab\sms\SmsServiceProvider::class,
    ```

3. Publish the Vendor Assets files by running:

    ```
    php artisan vendor:publish --provider="shaab\sms\SmsServiceProvider"
    ```

### Usage

1.  Add Facade to the controller:

    ```
    use shaab\sms\Facades\sms;
    ```
2. Call function

    ```
    SMS::send(9567######,"Message");
    ```
    Note: Its basic function in the package




