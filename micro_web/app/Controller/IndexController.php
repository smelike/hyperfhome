<?php
declare(strict_types=1);

use App\JsonRpc\AdditionService;
use App\JsonRpc\MultiplicationService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /* 
    * @RequestMapping(path="add")
    * @param AdditionService $addition
    * @return array
     */
    public function add(AdditionService $addition)
    {
        $a = $this->request->input('a', 1);
        $b = $this->request->input('b', 2);
        return [
            'a' => $a,
            'b' => $b,
            'addition' => $addition->add($a, $b)
        ];
    }

    /*
    * @RequestMapping(path="/mult")
    * @param MultiplicationService $mutiplication
    * @return array
     */
    public function multiply(MutiplicationService $multiplication)
    {
        $a = $this->request->input('a', 1);
        $b = $this->request->input('b', 2);

        return [
            'a' => $a,
            'b' => $b,
            'multiply' => $multiplication->multiply($a, $b)
        ];
    }
}
