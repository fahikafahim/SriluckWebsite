<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user'])->paginate(10);
        return OrderResource::collection($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'order_status' => 'required|string',
        ]);

        $order = Order::create($validated);

        return new OrderResource($order);
    }

    public function show(string $id)
    {
        $order = Order::with(['user', 'orderItems'])->findOrFail($id);
        return new OrderResource($order);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_status' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return new OrderResource($order);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
