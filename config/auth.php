<?php

return [



    'defaults' => [
        'guard' => 'user',
        'passwords' => 'users',
    ],

    

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
 
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [ //追加
            'driver' => 'session', //追加
            'provider' => 'admins', //追加
        ],
    ],
  
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [ //追加
            'driver' => 'eloquent', //追加
            'model' => App\Models\Admin::class, //追加
        ],
 
    ],
 
    
 
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [ //追加
            'provider' => 'admins', //追加
            'table' => 'password_resets', //追加
            'expire' => 60, //追加
        ],
    ],
 

    // 'providers' => [
    //     'users' => [
    //         'driver' => 'eloquent',
    //         'model' => App\Models\User::class,
    //     ],

    //     'admins' => [
    //         'driver' => 'eloquent',
    //         'model' => App\Models\Admin::class,
    //     ]
    // ],

  

    // 'passwords' => [
    //     'users' => [
    //         'provider' => 'users',
    //         'table' => 'password_resets',
    //         'expire' => 60,
    //     ],
    //     'admins' => [
    //         'provider' => 'admins',
    //         'table' => 'password_resets',
    //         'expire' => 60,
    //         'throttle' => 60,
    //     ]
    // ],

    'password_timeout' => 10800,

];
