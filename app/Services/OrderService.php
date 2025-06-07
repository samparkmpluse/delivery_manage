<?php
namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Services\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {

        $this->orderRepo = $orderRepo;

    }

    public function assignDeliveryPerson()
    {
        return $this->orderRepo->assignOrder();
    }

}
