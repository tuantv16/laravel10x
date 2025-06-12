<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Tạo đơn hàng (giả sử đã validate dữ liệu)
        $order = Order::create([
            'user_id' => $request->user_id,
            'total' => $request->total,
        ]);
 
        // Thêm các sản phẩm vào đơn hàng
        if (isset($request->products) && is_array($request->products)) {
            foreach ($request->products as $product) {
                $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
            }
        }
        
        // Phát sự kiện OrderPlaced
        event(new OrderPlaced($order));

        return response()->json(['message' => 'Order placed successfully']);
    }
}