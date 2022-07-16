<?php
declare(strict_types=1);

namespace App\JsonRpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * publicTo attibute for service register center
 * @RpcService(name="AdditionService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="nacos")
 * 
 */
class AdditionService
{
    public function add(int $a, int $b): int
    {
        var_dump(config('nacos_config.data_id'));
        return $a + $b;
    }
}