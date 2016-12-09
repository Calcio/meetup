<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // 'defaultRoles' => ['guest'],
        ],
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'suffix' => null,
        // ],
    ],
    'bootstrap' => ['debug'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '172.20.50.*'],
        ],
    ],
];
