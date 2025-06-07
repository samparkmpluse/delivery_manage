<?php
namespace App\Http\Controllers;

use App\Http\Controllers\OrderController;

class TestController extends Controller
{
    //
    protected $orderController;
    public function __construct(OrderController $orderController)
    {
        $this->orderController = $orderController;
    }

    // public function test()
    // {
    //     //      $orderController = new OrderController();

    //     //    $test = $orderController->deliveryAssign();
    //     $test = $this->orderController->deliveryAssign();

    //     print_R($test);
    // }
}
