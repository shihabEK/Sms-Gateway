<?php

namespace shaab\sms\Traits;

use shaab\sms\Facades\SMS;

trait CanBeSMS
{
    public function sms($message){
        $mobile = $mobile ?? 'mobile';
        return SMS::send($this[$mobile],$message);
    }

}
