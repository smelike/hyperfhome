<?php
declare(strict_types=1);

namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class MultiplicationService extends AbstractServiceClient
{
    protected $serviceName = 'MultiplicationService';
    protected $protocol = 'jsonrpc-http';

    public function multiply(int $a, int $b): int
    {
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }
    
}