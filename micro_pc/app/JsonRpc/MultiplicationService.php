<?php
namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class MultiplicationService extends AbstractServiceClient
{
    protected $serviceName = 'MultiplicationService';
    protected $protocol = 'jsonrpc-http';

    public function multiply($a, $b)
    {
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }
    
}