<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'customer_name',
        'email_id',
        'password',
        'address',
        'state',
        'city',
        'landmark',
        'pincode',
        'mobile_no',
        'note',
        'status',
    ];
}
