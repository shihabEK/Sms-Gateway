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
    public function send(){
        return SMS::send(9567302424,'Hello');
        return $this;
        return "Trait Working Fine";
    }
    public static function boot(){
        static::retrieved(function($model) {
            return "From Boot Method";
        });
    }

}
