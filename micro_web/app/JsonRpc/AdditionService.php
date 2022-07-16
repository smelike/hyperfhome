<?php
declare(strict_types=1);

namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class AdditionService extends AbstractServiceClient
{
    protected $serviceName = 'AdditionService';

    protected $protocol = 'jsonrpc-http';

    public function add(int $a, int $b): int
    {
        return $this->__request(
            __FUNCTION__, compact('a', 'b'));
    }
}