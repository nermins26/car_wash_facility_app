<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::all();

        return view('layouts.orders.all', compact('orders'));
    }

    public function showCreateOrders()
    {
        
    }

    public function showEditOrders($id)
    {
        
    }

    public function createOrders(Request $request)
    {
        
    }

    public function editOrders(Request $request, $id)
    {
        
    }

    public function deleteOrder(Request $request, $id)
    {
        
    }
}
