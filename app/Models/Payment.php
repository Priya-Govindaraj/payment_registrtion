<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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
}
