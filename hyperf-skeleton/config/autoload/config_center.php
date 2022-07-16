<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\ConfigCenter\Mode;

return [
    'enable' => (bool) env('CONFIG_CENTER_ENABLE', true),
    'driver' => env('CONFIG_CENTER_DRIVER', 'nacos'),
    'mode' => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_OVERWRITE,
            'interval' => 3,
            'default_key' => 'nacos_config',
            'listener_config' => [
                // dataId, group, tenant, type, content
                'nacos_config' => [
                    'tenant' => 'public', // corresponding with service.namespaceId
                    'data_id' => 'hyperf-service-config',
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'json',
                ],
                'nacos_config.data' => [
                    'data_id' => 'hyperf-service-config-yml',
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'json',
                ],
            ],
	    // 'client' => [
		// 'host' => env('LOCALHOST'),
        //         'port' => 8848,
        //         'username' => 'nacos',
        //         'password' => 'nacos',
        //         'guzzle' => [
        //             'config' => null,
        //     	],
	    //  ]
        ],
    ],
];