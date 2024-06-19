<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index
    public function index()
    {
        $orders = \App\Models\Order::with('kasir')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = \App\Models\Order::with('kasir')->findOrFail($id);

        // Eager load product relationship to prevent N+1 problem
        $orderItems = \App\Models\OrderItem::with('product')->where('order_id', $id)->get();

        // Filter out items with no product
        $orderItems = $orderItems->filter(function ($item) {
            return $item->product !== null;
        });

        return view('pages.orders.view', compact('order', 'orderItems'));
    }
}
