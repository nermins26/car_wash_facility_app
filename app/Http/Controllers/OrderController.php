<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use App\Models\OrderPhase;
use App\Models\PaymentMethod;
use App\Models\WashingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function showCreateOrders($program)
    {
        $user = auth()->user();
        $cars = Car::where('profile_id', $user->profile->id)->get();
        $paymentMethods = PaymentMethod::all();
        return view('layouts.orders.create', compact('cars', 'paymentMethods','program'));
    }

    public function previewOrder(Request $request)
    {
        //dd($request->query());
        
        $car = Car::where('id', $request->input('car'))->first();
        $payment_method = PaymentMethod::where('id', $request->input('payment_method'));
        $program = WashingProgram::where('id', $request->input('program'))->first();

        return view('layouts.orders.preview', compact('car', 'payment_method', 'program'));
    }

    public function showEditOrders(int $id)
    {
        $order = Order::where('id', $id)->first();
        $orderPhases = OrderPhase::all();
     
        if($order) {
            return view('layouts.orders.edit', compact('order', 'orderPhases'));
        } else {
            return abort(404, 'Order not found');
        }
    }

    public function createOrders(Request $request)
    {
        $request->validate([
            'program' => 'required|int',
            'car' => 'required|int',
        ]);

        $user = auth()->user();
        $program = WashingProgram::where('id', $request->input('program'))->first();
        $car = Car::where('id', $request->input('car'))->first();
        $price = 0;

        if($user->orderCount->count % 10 == 9) {
            $value = $program->price - (($program->price / 100)*20);
        } elseif($user->orderCount->count % 5 == 4) {
            $value = $program->price - (($program->price / 100)*10);
        } elseif ($user->orderCount->count == 0) {
            $value = $program->price - (($program->price / 100)*5);
        } else {
            $value = $program->price;
        }

        $price = round($value, 2);

        //dd($price);

        DB::table('orders')
        ->insert([
            'number' => mt_rand(100000,999999),
            'price' => $price,
            'user_id' => auth()->user()->id,
            'program_id' => $program->id,
            'car_id' => $car->id
        ]);

        OrderCreated::dispatch(auth()->user());

        return redirect(route('home'))->with('new-order-created', 'You sucessfully created new order');
        
    }

    public function editOrders(Request $request, int $id)
    {
        $request->validate([
            'order_phase_id' => 'required|int|max:255',
        ]);

        $order = Order::find($id);

        if($order) {
            $order->update($request->except(['_token', '_method']));
        
            return redirect(route('dashboard.show'))->with(["response-message" => "Successfully updated Order status"]);
        } else {
            return abort(404, 'Order not found');
        }
    }

    public function deleteOrder(int $id)
    {
        $order = Order::where('id', $id)->first();

        if($order) {
            Order::where('id', $id)->delete();
            
            return redirect(route('dashboard.show'))->with(["response-message" => "Successfully deleted the Order"]);
        } else {
            return abort(404, 'Order not found');
        }
    }
}
