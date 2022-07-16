<?php

$address = "http://" . env('LOCALHOST') . ':8848';
// 这个是nacos服务的端口和地址
$registry = [
    'protocol' => 'nacos',
    'address' => $address
];

// 这里配置需要用的rpc服务
$services = [
    '\App\JsonRpc\AdditionService',
    '\App\JsonRpc\MultiplicationService',
];


$nodes = [
	['host' => '172.17.0.3', 'port' => 9504]
];
return [
    // 此处省略了其它同层级的配置
    'consumers' => [
		[
			'name' => 'AdditionService', 
			'service' =>  \App\JsonRpc\AdditionService::class,
			'id' =>  \App\JsonRpc\AdditionService::class,
			'registery' => $registry, 
			'nodes' => $nodes
		],
		[
			'name' => 'MultiplicationService',
			'service' =>  \App\JsonRpc\MultiplicationService::class,
			'id' => \App\JsonRpc\MultiplicationService::class,
			'registery' => $registry,
			'nodes' => $nodes
		],
	],
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