<?php
namespace App\Repositories;

use App\Models\AssignOrder;
use App\Models\DeliveryPerson;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Carbon;

class OrderRepository implements OrderRepositoryInterface
{
    public function assignOrder()
    {
        $fetchDeliveryBoyData = DeliveryPerson::orderBy('id', 'asc');
        $deliveryPerson       = $fetchDeliveryBoyData->get();

        $boy_count = $fetchDeliveryBoyData->count();

        // $expiretime = Carbon::now()->subMinutes(30);
        $expiretime   = Carbon::now()->subMinutes(1);
        $pendingorder = Order::where('order_status', 'pending')->orderBy('id', 'asc')->get();

        foreach ($deliveryPerson as $per) {

            foreach ($pendingorder as $order) {

                $checkAssignCount = AssignOrder::where('user_id', $per->id)->where('assign_time', '>=', $expiretime)->count();
                $checkAssign      = AssignOrder::where('order_id', $order->id)->where('assign_time', '>=', $expiretime)->exists();

                if ($checkAssign) {
                    continue;
                }
                if ($per->capacity > $checkAssignCount) {
                    $updOrder               = new AssignOrder();
                    $updOrder->user_id      = $per->id;
                    $updOrder->order_id     = $order->id;
                    $updOrder->assign_time  = now();
                    $updOrder->order_status = 'Assigned';

                    $updOrder->save();

                    $getOrder               = Order::find($order->id);
                    $getOrder->order_status = 'assigned';
                    $getOrder->save();

                } else {
                    break;
                }

            }

        }
    }
}
