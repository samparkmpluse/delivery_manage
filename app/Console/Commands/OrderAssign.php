<?php
namespace App\Console\Commands;

use App\Http\Controllers\OrderController;
use Illuminate\Console\Command;

class OrderAssign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:order-assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     $fetchDeliveryBoyData = DeliveryPerson::orderBy('id', 'asc');
    //     $deliveryPerson       = $fetchDeliveryBoyData->get();

    //     $boy_count = $fetchDeliveryBoyData->count();

    //        $expiretime = Carbon::now()->subMinutes(30);
    //     // $expiretime   = Carbon::now()->subMinutes(1);
    //     $pendingorder = Order::where('order_status', 'pending')->orderBy('id', 'asc')->get();

    //     foreach ($deliveryPerson as $per) {

    //         foreach ($pendingorder as $order) {

    //             $checkAssignCount = AssignOrder::where('user_id', $per->id)->where('assign_time', '>=', $expiretime)->count();
    //             $checkAssign      = AssignOrder::where('order_id', $order->id)->where('assign_time', '>=', $expiretime)->exists();

    //             if ($checkAssign) {
    //                 continue;
    //             }
    //             if ($per->capacity > $checkAssignCount) {
    //                 $updOrder               = new AssignOrder();
    //                 $updOrder->user_id      = $per->id;
    //                 $updOrder->order_id     = $order->id;
    //                 $updOrder->assign_time  = now();
    //                 $updOrder->order_status = 'Assigned';

    //                 $updOrder->save();

    //                 $getOrder               = Order::find($order->id);
    //                 $getOrder->order_status = 'assigned';
    //                 $getOrder->save();

    //             } else {
    //                 break;
    //             }

    //         }

    //     }
    // }

    protected $orderController;
    public function __construct(OrderController $orderController)
    {
        parent::__construct();
        $this->orderController = $orderController;
    }

    public function handle()
    {

        $this->orderController->deliveryAssign();
    }
}
