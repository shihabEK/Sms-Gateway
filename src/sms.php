<?php

namespace shaab\sms;


class sms
{
    public function send($to,$message){
        if( config('sms.default.gateway') =="MSG91"){
            return self::msg91_Send(config('sms.MSG91.authKey'),config('sms.MSG91.default_route'),config('sms.default.sender_id'),$to,$message);
        }elseif( config('sms.default.gateway') =="TextLocal"){
            return self::textlocal_send(config('sms.TextLocal.apiKey'),config('sms.default.sender_id'),$to,$message);
        }
    }

    // Balance Check function For MSG91
    public function msg91_balance($route){
        return self::msg91_check_balance(config('sms.MSG91.authKey'),$route);
    }
    // Balance Check function For TextLocal
    public function textlocal_balance(){
        return self::textlocal_check_balance(config('sms.TextLocal.apiKey'));
    }


    public function textlocal_send($apiKey,$senderId,$to,$message){
        // Account details
	$apiKey = urlencode($apiKey);

	// Message details
	$sender = urlencode($senderId);
	$message = rawurlencode($message);

    if(is_array($to)){
            $to = implode (",", $to);
    }


	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $to, "sender" => $sender, "message" => $message);

	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);

	// Process your response here
	echo $response;
    }
    public function msg91_Send($authKey,$route,$senderId,$to,$message){

        if(is_array($to)){
            $to = implode (",", $to);
        }
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $to,
            'message' => urlencode($message),
            'sender' => $senderId,
            'route' => $route
        );

        //API URL
        $url="https://api.msg91.com/api/v2/sendsms?country=91";

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
    public function textlocal_check_balance($apiKey){
        // Account details
        $apiKey = urlencode($apiKey);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/balance/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process your response here
        echo $response;
    }
    public function msg91_check_balance($authKey,$route){
        $url = "https://control.msg91.com/api/balance.php?authkey=".$authKey."&type=".$route;

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }
}
