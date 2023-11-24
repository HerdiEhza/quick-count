<?php

return [
    'bacaleg' => 127,
    // 'bacaleg' => 17,
    'dapil' => 1,
    'kategori_pemilu' => 2,

    'timses' => [
        'use_ktp' => false,
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
];
