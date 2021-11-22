<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Order;
use App\Payment;
use App\Room;
use App\User;
use BookingHelper;
use Carbon\Carbon;
use App\Paysera\WebToPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChekoutController extends Controller
{
    public function checkoutPost(Request $request)
    {
        $carts = BookingHelper::get(Room::SELECTED_ROOMS);
        $totalAmount = 0;
        foreach ($carts as $item) {
            $totalAmount =  $totalAmount + $item['total'];
        }
        $order_id = uniqid();
        $authData = $request->all();

        if ($request->paysera == 1) {
            Session::put('auth_data', $authData);
            Session::put('order_id', $order_id);
            return $this->payseraUrl($totalAmount, $order_id);
        } else {
            $this->saveOreders($authData, $order_id);
            return 'success';
        }
    }

    public function payseraAccept()
    {
        $data = Session::get('auth_data');
        $order_id = Session::get('order_id');
        if ($order_id) {
            $this->saveOreders($data, $order_id);
        } else {
            Session::forget('auth_data');
            Session::forget('order_id');
            return redirect()->route('profile', [auth()->user()->id]);
        }
        Session::forget('auth_data');
        Session::forget('order_id');
        return redirect("/users/auth()->id()/profile");
    }
    public function payseraCancel()
    {
        return redirect('/');
    }
    public function payseraUrl($totalAmount, $order_id)
    {
        try {
            $self_url = $this->get_self_url();
            $paysera_ammount = $totalAmount * 100;
            $request = WebToPay::redirectToPayment(array(
                'projectid'     => 130442,
                'sign_password' => '873a420964dbfac72c5b49ce65cb1991',
                'orderid'       => $order_id,
                'amount'        => $paysera_ammount,
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => $self_url . 'paysera/accepted',
                'cancelurl'     => $self_url . 'paysera/cancel',
                'callbackurl'   => $self_url . 'paysera/callback',
                'test'          => 0,
            ));
            return $request;
        } catch (WebToPayException $e) {
            // handle exception
        }
    }
    public function payseraCallback()
    {
        try {
            $response = WebToPay::checkResponse($_GET, array(
                'projectid'     => 130442,
                'sign_password' => '873a420964dbfac72c5b49ce65cb1991',
            ));
            if ($response['test'] !== '0') {
                throw new Exception('Testing, real payment was not made');
            }
            if ($response['type'] !== 'macro') {
                throw new Exception('Only macro payment callbacks are accepted');
            }

            $orderId = $response['orderid'];
            $amount = $response['amount'];
            $currency = $response['currency'];

            echo 'OK';
        } catch (Exception $e) {
            echo get_class($e) . ': ' . $e->getMessage();
        }
    }
    public function saveOreders($auth_data, $order_id)
    {
        $data = $auth_data;
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
            $authenticate = true;
        } else {
            //TODO: validate user
            $data = $auth_data;
            $password = $data['password'];
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            if (!auth()->user()) {
                $credentials = [
                    'email' => $data['email'],
                    'password' => $password,
                ];

                $authenticate = $this->authenticate($credentials);
            }
        }
        $carts = BookingHelper::get(Room::SELECTED_ROOMS);
        //TODO: if null redirect to add new room


        if ($authenticate) {
            foreach ($carts as $item) {
                $order_id = uniqid();
                $cart['order_id'] = $order_id;
                $cart['room_id'] = $item['id'];
                $cart['user_id'] = auth()->user()->id;
                $cart['number_of_room'] = $item['number_of_room'];
                $cart['number_of_adult'] = $item['number_of_adult'];
                $cart['number_of_child'] = $item['number_of_child'];
                $cart['arival_date'] = Carbon::parse($item['arrive_date'])->format('y-m-d');
                $cart['depature_date'] = Carbon::parse($item['departure_date'])->format('y-m-d');
                $cart['price'] = $item['price'];
                $cart['days'] = $item['days'];
                $cart['total'] = $item['total'];
                Cart::create($cart);
                $payment = Payment::create([
                    'order_id' => $order_id,
                    'invoice_id' => uniqid(),
                    'amount' => rand(30, $item['total']),
                    'payment_type' => 'card',
                ]);
                Order::create([
                    'order_id' => $order_id,
                    'user_id' => auth()->user()->id,
                    'total_amount' => BookingHelper::get(Room::SUB_TOTAL),
                    'is_paid' => $payment->amount >= BookingHelper::get(Room::SUB_TOTAL) ? 1 : 0
                ]);
            }
        } else {
            //TODO: remove data from data base
        }
    }
    public function authenticate($credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }
    public function get_self_url()
    {
        $s = substr(
            strtolower($_SERVER['SERVER_PROTOCOL']),
            0,
            strpos($_SERVER['SERVER_PROTOCOL'], '/')
        );

        if (!empty($_SERVER["HTTPS"])) {
            $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
        }

        $s .= '://' . $_SERVER['HTTP_HOST'];

        if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
            $s .= ':' . $_SERVER['SERVER_PORT'];
        }

        $s .= dirname($_SERVER['SCRIPT_NAME']);

        return $s;
    }
}
