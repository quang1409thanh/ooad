<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'customer_id',
        'payment_type',
        'product_id',
        'bidding_id',
        'paid_amount',
        'paid_date',
        'status',
    ];

    // Các quan hệ có thể được định nghĩa ở đây

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'bidding_id', 'bidding_id');
    }

}
