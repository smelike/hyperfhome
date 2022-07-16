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

 // 这个是nacos服务的端口和地址
$address = 'http://' . env('LOCALHOST') . ':8848';
$registry = [
    'protocol' => 'nacos',
    'address' => $address,
];

// 这里配置需要用的rpc服务
$services = [
    'AdditionService',
    'MultiplicationService',
];

return [
    // 此处省略了其它同层级的配置
    'consumers' => value(function () use ($services, $registry) {
        // 循环生成rpc消费端
        $consumers = [];
        foreach ($services as $name) {
            $consumers[] = [
                'name' => $name,
                'registry' => $registry
            ];
        }
        return $consumers;
    }),
    // Nacos服务驱动相关配置
    'drivers' => [
        'nacos' => [
            // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
            // 'url' => '',
            // The nacos host info
            'host' => env('LOCALHOST'),
            'port' => 8848,
            // The nacos account info
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
            'group_name' => 'public',
            'heartbeat' => 5,
        ],
    ],
];