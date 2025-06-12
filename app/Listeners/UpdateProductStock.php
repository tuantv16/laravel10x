<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductStock
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event)
    {

        // Duyệt qua từng sản phẩm trong đơn hàng
        foreach ($event->order->products as $product) {
            // Giảm số lượng tồn kho của sản phẩm theo số lượng trong đơn hàng
            $product->stock_quantity -= $product->pivot->quantity;
            $product->save();
        }
    }
}
