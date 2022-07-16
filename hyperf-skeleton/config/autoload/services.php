<?php

// 组件由 config/autoload/services.php 配置文件来驱动，如果没有改文件,自行创建：
return [
    'enable' => [
        // 开启服务发现
        'discovery' => true,
        // 开启服务注册
        'register' => true,
    ],
    // 服务消费者相关配置
    'consumers' => [],
    // 服务提供者相关配置
    'providers' => [],
    // 服务驱动相关配置
    'drivers' => [
		// nacos 配置,当前使用
        'nacos' => [
            // The nacos host info
            'host' => env('LOCALHOST'),
            'port' => 8848,
            // nacos 账号密码信息
            'username' => 'nacos',
            'password' => 'nacos',
            'guzzle' => [
                'config' => null,
            ],
				 // 命名空间,public为默认系统空间
            'group_name' => 'public', 
				 // 命名空间ID
            // 'namespace_id' => 'namespace_id',
				 // 心跳检查秒数
            'heartbeat' => 5,
        ],
    ],
];
