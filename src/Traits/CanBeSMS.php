<?php

/*
 * This file is part of the jcc/laravel-vote.
 *
 * (c) jcc <changejian@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace shaab\sms\Traits;

use shaab\sms\Facades\SMS;

trait CanBeSMS
{
    public function sms($message){
        $mobile = $mobile ?? 'mobile';
        return SMS::send($this[$mobile],$message);
    }

}
