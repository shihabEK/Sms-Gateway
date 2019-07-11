<?php

namespace shaab\sms;


class sms
{
    public function send($to,$message){

        if(config('sms.default_gateway')=="MSG91"){
            return self::MSG91_Send(config('sms.authKey'),config('sms.default_route'),config('sms.sender_id'),$to,$message);
        }
    }


    public function MSG91_Send($authKey,$route,$senderId,$to,$message){

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => implode (",", $to),
            'message' => urlencode($message),
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="https://api.msg91.com/api/v2/sendsms?country=0";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }
}