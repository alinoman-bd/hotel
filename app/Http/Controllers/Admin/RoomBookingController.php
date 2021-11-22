<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cart;
use App\Order;
use App\Payment;
use Carbon\Carbon;

class RoomBookingController extends Controller
{
    public function store(Request $request)
    {
        $arrival = Carbon::parse($request->room['arival_date']);
        $departure = Carbon::parse($request->room['depature_date']);
        $paid = $request->user['paid'];
        $remark = $request->user['remark'];
        $days = $arrival->diffInDays($departure);
        $total = (int) $request->room['room_price'] * $days * (int)$request->room['number_of_room'];

        $user = $this->createUser($request->user);
        if ($user) {
            $order_id = uniqid();
            $cart['order_id'] = $order_id;
            $cart['room_id'] = $request->room['room_id'];
            $cart['user_id'] = $user->id;
            $cart['number_of_room'] = $request->room['number_of_room'];
            $cart['number_of_adult'] = $request->room['number_of_adult'];
            $cart['number_of_child'] = $request->room['number_of_child'];
            $cart['remark'] = $remark;
            $cart['arival_date'] = $arrival->format('y-m-d');
            $cart['depature_date'] = $departure->format('y-m-d');
            $cart['price'] = $request->room['room_price'];
            $cart['days'] = $days;
            $cart['total'] = $total;
            Cart::create($cart);
            $payment = Payment::create([
                'order_id' => $order_id,
                'invoice_id' => uniqid(),
                'amount' => $paid,
                'payment_type' => 'admin',
            ]);
            Order::create([
                'order_id' => $order_id,
                'user_id' => $user->id,
                'total_amount' => $total,
                'is_paid' => $paid >= $total ? 1 : 0
            ]);
        }
        return true;
    }
    public function createUser($user)
    {
        $user['password'] = Hash::make('password');
        return User::create($user);
    }
}
