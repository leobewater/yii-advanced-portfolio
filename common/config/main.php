<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'formatter' => [
          'dateFormat' => 'yyyy-MM-dd'
        ],
        // Append timestamp when loading css files in FE and BE
        'assetManager' => [
          'appendTimestamp' => true
        ]
    ],
];
