<?php
namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class AdditionService extends AbstractServiceClient
{
    protected $serviceName = 'AdditionService';

    protected $protocol = 'jsonrpc-http';

    public function add($a, $b)
    {
        return $this->__request(
            __FUNCTION__, compact('a', 'b'));
    }
}