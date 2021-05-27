<?php

return [

    'alias' => null,

    'dev_domain' => env('DEV_DOMAIN', 'realstate.test'),

    'projects' => [
        [
            'name' => 'Yask.pro',
            'domain' => 'yask.pro',
            'alias' => 'yask',
            'is_main' => 1,
        ],
        [
            'name' => 'chasaCHAU',
            'domain' => 'chasachau.com',
            'alias' => 'chasa',
        ],
        [
            'name' => 'AlbGrisch',
            'domain' => 'albgrisch.com',
            'alias' => 'ag',
        ],
    ],
];
