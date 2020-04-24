<?php


return [

    //Default Values

    'default'   =>  [
        'gateway' => 'msg91',
        'sender_id' => 'SHIHAB',     // 6 Characters only
    ],

    //MSG91 Configaration

    'MSG91' => [
        'authKey'   => '< your auth key >', //authKey from MSG91
        'default_route' => '4', // 1: Promotional 4: Transectional
    ],

    //TextLocal Configaration

    'TextLocal' =>  [
        'apiKey'   => '< your auth key >', //authKey from TextLocal
    ]



];