<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use App\Models\Registration;
use App\Models\State;
use App\Models\City;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        $states = State::all();
        $cities = City::all();
        return view('registration_form',compact('states','cities'));
    }
    // public function payment(Request $request)
    // {
    //     // Initialize Razorpay API
    //     $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_SECRET_KEY'));

    //     // Get the payment ID and other details from the AJAX request
    //     $paymentId = $request->input('paymentId');
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $mciNo = $request->input('mciNo');
    //     $address = $request->input('address');
    //     $city = $request->input('city');
    //     $district = $request->input('district');
    //     $pincode = $request->input('pincode');
    //     $userType = $request->input('userType');

    //     // Verify the payment
    //     $payment = $api->payment->fetch($paymentId);
    //     if ($payment->status == 'captured') {
    //         // Payment is successful, save the registration details in the database
    //         $registration = new Registration;
    //         $registration->name = $name;
    //         $registration->email = $email;
    //         $registration->mci_no = $mciNo;
    //         $registration->address = $address;
    //         $registration->city = $city;
    //         $registration->district = $district;
    //         $registration->pincode = $pincode;
    //         $registration->user_type = $userType;
    //         $registration->payment_id = $paymentId;
    //         $registration->save();

    //         // Return success response
    //         return response()->json(['success' => true, 'message' => 'Registration Successful']);
    //     } else {
    //         // Payment is failed, return error response
    //         return response()->json(['success' => false, 'message' => 'Payment Failed']);
    //     }
    // }
    // public function success(Request $request)
    // {
    //     // Get the payment ID from the request
    //     $paymentId = $request->input('razorpay_payment_id');

    //     // Verify the payment using the Razorpay API
    //     $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    //     $payment = $api->payment->fetch($paymentId);
    //     $paymentId = $request->input('paymentId');
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $mciNo = $request->input('mciNo');
    //     $address = $request->input('address');
    //     $city = $request->input('city');
    //     $district = $request->input('district');
    //     $pincode = $request->input('pincode');
    //     $userType = $request->input('userType');
    //     // Return success if payment is verified, otherwise return error
    //     if($payment->status == 'captured') {
    //         $registration = new Registration;
    //         $registration->name = $name;
    //         $registration->email = $email;
    //         $registration->mci_no = $mciNo;
    //         $registration->address = $address;
    //         $registration->city = $city;
    //         $registration->district = $district;
    //         $registration->pincode = $pincode;
    //         $registration->user_type = $userType;
    //         $registration->payment_id = $paymentId;
    //         $registration->save();
    //         return response()->json(['success' => true]);
    //     } else {
    //         return response()->json(['success' => false]);
    //     }
    // }

    // public function payment(Request $request)
    // {
    //     // Get the form data
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $phone = $request->input('phone');
    //     $amount = $request->input('amount');

    //     // Create a new Razorpay instance
    //     $api_key = 'YOUR_RAZORPAY_API_KEY';
    //     $api_secret = 'YOUR_RAZORPAY_API_SECRET';
    //     $api = new Api($api_key, $api_secret);

    //     // Create an order on Razorpay
    //     $order = $api->order->create([
    //         'amount' => $amount * 100, // Convert amount to paise
    //         'currency' => 'INR',
    //         'payment_capture' => 1,
    //     ]);

    //     // Get the order ID
    //     $order_id = $order['id'];

    //     // Return the order ID to the front-end
    //     return response()->json([
    //         'order_id' => $order_id,
    //     ]);
    // }
    // public function success(Request $request)
    // {
    //     // Get the order ID and payment ID
    //     $order_id = $request->input('razorpay_order_id');
    //     $payment_id = $request->input('razorpay_payment_id');

    //     // Verify the signature
    //     $api_key = 'YOUR_RAZORPAY_API_KEY';
    //     $api_secret = 'YOUR_RAZORPAY_API_SECRET';
    //     $api = new Api($api_key, $api_secret);
    //     $attributes = [
    //         'razorpay_order_id' => $order_id,
    //         'razorpay_payment_id' => $payment_id,
    //     ];
    //     try {
    //         $api->utility->verifyPaymentSignature($attributes);
    //     } catch (\Exception $e) {
    //         // Handle the exception
    //         return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
    //     }

    // }
}


