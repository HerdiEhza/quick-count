<?php

return [

    'timses' => [
        // 'bacaleg' => 127, // Ustad Miftah
        // 'dapil' => 1, // Ustad  Miftah
        // 'kategori_pemilu' => 2, // Ustad  Miftah

        // 'bacaleg' => 258, // Agung Prasetyo
        // 'dapil' => 3, // Agung Prasetyo
        // 'kategori_pemilu' => 3,

        'bacaleg' => 764, // Subandi
        'dapil' => 75, // Subandi
        'kategori_pemilu' => 4, // Subandi

        //

        'import_relawan' => false,
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
