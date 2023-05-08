<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Payment;

class RazorpayController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('razorpay');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
         $input = $request->all();
$name = $request->input('name');
$amount =$request->input('amount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt' => '123','amount'=> $amount * 100,'currency'=> 'INR'));
        $orderId = $order['id'];

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                return response()->json($response, 204);
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        $user_pay=new Payment;
        $user_pay->name = $name;
        $user_pay->amount = $amount;
        $user_pay->payment_id =$orderId;
        $user_pay->save();
        Session::put('orderId',$orderId);
        Session::put('amount', $amount );
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
