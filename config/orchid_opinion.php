<?php

return [
    'bacaleg' => 258,
    // 'bacaleg' => 127,
    // 'bacaleg' => 17,
    // 'bacaleg' => 258 | Agung Prasetyo,
    // 'dapil' => 1 | DPR RI,
    'dapil' => 3,
    'kategori_pemilu' => 3,

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
