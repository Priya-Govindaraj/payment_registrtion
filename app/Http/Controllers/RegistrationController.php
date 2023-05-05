<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration_form');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mciNo' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'pincode' => 'required',
            'userType' => 'required',
            'amount' => 'required',
            'razorpay_payment_id' => 'required'
        ]);

        // Get the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $mciNo = $request->input('mciNo');
        $address = $request->input('address');
        $city = $request->input('city');
        $district = $request->input('district');
        $pincode = $request->input('pincode');
        $userType = $request->input('userType');
        $amount = $request->input('amount');
        $paymentId = $request->input('razorpay_payment_id');

        // Generate OTP
        $otp = rand(100000, 999999);

        // Send OTP to the user's email
        Mail::send('emails.otp', ['otp' => $otp], function($message) use ($email) {
            $message->to($email)->subject('Registration OTP');
        });

        // Save the registration details in the database
        $registration = new Registration;
        $registration->name = $name;
        $registration->email = $email;
        $registration->mci_no = $mciNo;
        $registration->address = $address;
        $registration->city = $city;
        $registration->district = $district;
        $registration->pincode = $pincode;
        $registration->user_type = $userType;
        $registration->amount = $amount;
        $registration->payment_id = $paymentId;
        $registration->otp = $otp;
         $registration->save();
        // dd($registration);

         return redirect()->back()->with('success', 'Registration Successful');
    }

    public function verifyPayment(Request $request)
    {
        // Get the payment ID from the request
        $paymentId = $request->input('razorpay_payment_id');

        // Verify the payment using the Razorpay API
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $payment = $api->payment->fetch($paymentId);

        // Return success if payment is verified, otherwise return error
        if($payment->status == 'captured') {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
