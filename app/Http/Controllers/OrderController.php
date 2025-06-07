<?php
namespace App\Http\Controllers;

use App\Services\Interfaces\OrderServiceInterface;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;

    }


    public function deliveryAssign()
    {
        return $this->orderService->assignDeliveryPerson();
    }
}
