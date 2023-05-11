<?php
namespace App\Models;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use App\Mail\PaymentRegistrationMail;
use Illuminate\Mail\Mailable;

class Registration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mci_no',
        'address',
        'city',
        'district',
        'pincode',
        'user_type',
        'payment_id',
    ];
    public static function boot()
    {
        Parent::boot();

        static::created(function ($item) {
            $usermail ="grajpriya2@gmail.com";

            $uname = $item->sponsor_name;

            Mail::to($usermail)->cc($usermail)->bcc($usermail)->send(new PaymentRegistrationMail($item,$uname));
        });
    }
}
