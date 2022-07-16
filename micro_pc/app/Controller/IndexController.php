<?php
namespace App\Controller;

//declare(strict_types=1);

use App\JsonRpc\AdditionService;
use App\JsonRpc\MultiplicationService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/*
* @Controller()
*/
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
    * @RequestMapping(path="/add")
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
    * @param MultiplicationService $multiplication
    * @return array
     */
    public function multiply(MultiplicationService $multiplication)
    {
		//echo time();exit;
        $a = $this->request->input('a', 1);
        $b = $this->request->input('b', 2);

        return [
            'a' => $a,
            'b' => $b,
            'multiply' => $multiplication->multiply($a, $b)
        ];
    }
}
